<?php

namespace App\Http\Controllers;

use Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Auth;
use Validator;
use DB;
use App\ProjectType;
use App\User;
use App\Project;
use App\Feature;
use App\Platform; 
use App\FeatureProject;
use App\ProjectOppertunity;
use App\Portfolio;
use App\LookFeelField;


class SuperadminController extends Controller
{
  
  public function __construct()
     {
        $this->middleware('admin');
     }

  public function CMS()  
     {
     	return view('cms.home'); 
     }

  public function viewUsers()   
    {
      $allusers = User::all();
      return view('cms.view_sales_person')->with('allusers',$allusers); 
    }

  public function createNewUser()
    {  
        $requestData = Request::all();
    
        $validator = Validator::make(
                                        $requestData,
                                        [
                                            'full_name' => 'required', 
                                            'user_name' => 'required|unique:users',
                                            'email'     => 'required|email|unique:users',
                                            'user_type' => 'required',
                                            'password' => 'required|confirmed|min:3',
                                            'password_confirmation' => 'required|min:3'
                                        ],
                                        [
                                            'full_name.required'=>'Please give user name',
                                            'user_name.unique'  =>'Username Already Taken, please try a different Username',
                                            'email.unique'      =>'Email already used, please try a different email'
                                        ]
                                    );
        //Validator Failed
        if ($validator->fails())
        {
            return Redirect::back()->withErrors($validator)
                            ->withInput(
                                            Request::except('password')
                                        );
        }

        //Add the user - Start     
        $user = new User;
        $user->full_name    = $requestData['full_name'];
        $user->user_name    = $requestData['user_name'];
        $user->email        = $requestData['email'];
        $user->user_type    = $requestData['user_type'];
        $user->is_enabled   = 'enabled';
        $user->password     = bcrypt( $requestData['password'] );
        $user->save();
        //Add the user - End

        return Redirect::back()
                    ->withInput(
                                    Request::except(['password','password_confirmation'])
                                )
                    ->withErrors(
                                    [
                                        $msg ='User Successfully added'
                                    ]
                                );
    }  

  public function updateUser($id)  
    {
      $user_info = User::findOrFail($id);     
      return view('cms.update_user')->with('user_info',$user_info); 
    }

  public function updatingUser($id)
    {

      $rules=[
              /*'full_name'=>'required',             
              'user_name'=>'required',
            // 'mobile'  => 'phone:SG', 
              'email'=>'required|email|unique:users', */
              'password'=> 'required',
              'password_confirmation'=>'required|same:password' 
           ];

        $validator=Validator::make(Input::all(),$rules);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput(Input::except('password'),Input::except('password_confirmation'));
           }

      $user = User::find($id);       
      $user->full_name  = Input::get('full_name');
      $user->user_name  = Input::get('user_name');
      $user->email      = Input::get('email');
      $user->user_type  = Input::get('user_type');
      $user->is_enabled = 'enabled';
      $user->password   = bcrypt(Input::get('password'));

      if($user->save())
        { 
          \Session::flash('flash_message', 'Successfully updated!');
          return $this->updateUser($id);
        }
       else
         { 
           \Session::flash('alert-class', 'Not Successfully updated!');
            return $this->updateUser($id);
         } 
      }

   public function deleteUser($id)
     {
       $delete = DB::table('users')->where('id',$id)->delete();

        if($delete)
               {
                 \Session::flash('flash_message','Successfully Deleted');
                 return $this->viewUsers();
               }    
             else 
                 {                       
                   \Session::flash('alert-class', 'Not Successfully Deleted'); 
                   return $this->viewUsers();
                 }
        
        /*return Redirect::back()
                    ->withErrors(
                                    [
                                        'msg' => 'Successfully Deleted'
                                    ]
                                );*/
     }  

   public function viewProjectPlatform()
     {
       $allplatforms = Platform::all();
       return view('cms.view_project_platform')->with('allplatforms',$allplatforms); 
     } 

   public function addProjectPlatform()
     { 
       $platform = new Platform();       
       $platform->name  = Input::get('name');

       if($platform->save())
        { 
          \Session::flash('flash_message', 'Successfully Added!');
          return $this->viewProjectPlatform();
        }
       else
         { 
           \Session::flash('alert-class', 'Not Successfully Added!');
            return $this->viewProjectPlatform();
         } 
      
     }    

    public function editProjectPlatform($id)
     {
       $project_platform = Platform::where('id',$id)->first();    
       return view('cms.update_project_platform')->with('project_platform',$project_platform);   
      } 

   public function editingProjectPlatform($id)
     {
       $platform = Platform::find($id);       
       $platform->name  = Input::get('name');
       
       if($platform->save())
        { 
          \Session::flash('flash_message', 'Successfully Updated!');
          return $this->editProjectPlatform($id);
        }
       else
         { 
           \Session::flash('alert-class', 'Not Successfully Updated!');
            return $this->editProjectPlatform($id);
         }  
     }   

   public function deleteProjectPlatform($id)
     {
       $delete = DB::table('platforms')->where('id',$id)->delete();

        if($delete)
         {
           \Session::flash('flash_message','Successfully Deleted');
           return $this->viewProjectPlatform();
         }    
       else 
           {                       
             \Session::flash('alert-class', 'Not Successfully Deleted'); 
             return $this->viewProjectPlatform();
           }
     }        


   public function ViewPortfolio()
     {
        $allportfolio = Portfolio::all();
        return view('cms.view_portfolio')->with('allportfolio',$allportfolio);
     }

   public function createPortfolio()  
     {
       $requestData = Request::all();

       $portfolio = new Portfolio();
       $portfolio->name = $requestData['name'];
       $portfolio->tags = $requestData['tags'];
       $portfolio->type = $requestData['type'];
       $portfolio->link = $requestData['link'];       
       
       if($portfolio->save())
         {           
            $screenshots = $requestData['screenshots'];
            $upload  = 'portfolio_images/'.$portfolio->id;
            $filename = $screenshots->getClientOriginalName();
            $success = $screenshots->move($upload,$filename);
            
            $portfolio_screenshots = Portfolio::find($portfolio->id); 
            $portfolio_screenshots->screenshots  =  $upload.'/'.$filename;
            if($portfolio_screenshots->save())
             {
               \Session::flash('flash_message', 'Screenshots Successfully Added!');
               return $this->ViewPortfolio();
             }           
            else
              {
                \Session::flash('alert-class', 'Screenshots Not Successfully Added!');
                return $this->ViewPortfolio();
              } 
            }  
       else
        { 
          \Session::flash('alert-class', 'Not Successfully Added!');
          return $this->ViewPortfolio();
        }     
     }

  public function editPortfolio($id)
    {
      $portfolio_info = Portfolio::where('id',$id)->first();    
      return view('cms.edit_portfolio')->with('portfolio_info',$portfolio_info);   
    }    

  public function editingPortfolio($id)
    {
       $requestData = Request::all();

       $portfolio = Portfolio::find($id); 
       $portfolio->name = $requestData['name'];
       $portfolio->tags = $requestData['tags'];
       $portfolio->type = $requestData['type'];
       $portfolio->link = $requestData['link']; 
      
       
        if($portfolio->save())
         {/*           
            $screenshots = $requestData['screenshots'];
            $upload  = 'portfolio_images/'.$id;
            $filename = $screenshots->getClientOriginalName();
            $success = $screenshots->move($upload,$filename);
            
            $portfolio_screenshots = Portfolio::find($portfolio->id); 
            $portfolio_screenshots->screenshots  =  $upload.'/'.$filename;
            if($portfolio_screenshots->save())
             {
               \Session::flash('flash_message', 'Screenshots Successfully Updated!');
               return $this->ViewPortfolio();
             }           
            else
              { */
                \Session::flash('alert-class', 'Screenshots Not Successfully Updated!');
                return $this->ViewPortfolio();
              //} 
            }  
       else
        { 
          \Session::flash('alert-class', 'Not Successfully Updated!');
          return $this->ViewPortfolio();
        }    
    } 

  public function deletePortfolio($id)
    {
        $delete = DB::table('portforlios')->where('id',$id)->delete();

        if($delete)
         {
           \Session::flash('flash_message','Successfully Deleted');
           return $this->ViewPortfolio();
         }    
       else 
           {                       
             \Session::flash('alert-class', 'Not Successfully Deleted'); 
             return $this->ViewPortfolio();
           }
    }  

  public function viewLookFeel() 
    {
      $look_and_fell = DB::table('look_feel_fields')->get();     
      return view('cms.view_look_feel')->with('look_and_fell',$look_and_fell);    
    } 

  public function EditLookFeel($id)  
    {
      $look_and_fell = DB::table('look_feel_fields')->where('id',$id)->first();     
      return view('cms.edit_look_feel')->with('look_and_fell',$look_and_fell); 
    }

  public function EditingLookFeel($id)  
    { 
       $look_and_fell = LookFeelField::find($id);
       $look_and_fell->sitemap = Input::get('sitemap');
       $look_and_fell->look_and_fell = Input::get('look_and_fell');
       $look_and_fell->references_website = Input::get('references_website');
       $look_and_fell->about_references = Input::get('about_references');
       $look_and_fell->related_documents = Input::get('related_documents');
       $look_and_fell->preferend_fonts = Input::get('preferend_fonts');
       $look_and_fell->prefers_color = Input::get('prefers_color');
       $look_and_fell->other_notes = Input::get('other_notes');
       if($look_and_fell->save())
        { 
          \Session::flash('flash_message', 'Successfully updated!');
          return $this->EditLookFeel($id);
        }
       else
         { 
           \Session::flash('alert-class', 'Not Successfully updated!');
            return $this->EditLookFeel($id);
         } 
    }

} // end class
