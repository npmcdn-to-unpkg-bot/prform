        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="copy-info text-center">
                            Copyright 2015 <strong>Top3 Media</strong>. All Rights Reserved.
                        </div>
                    </div>
                </div>
            </div>
        </footer>

    @section('footer_scripts')
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="{{ URL::asset('js/bootstrap.min.js') }}"></script>
        <script src="{{ URL::asset('plugins/bootstrap-datetimepicker/moment.min.js') }}"></script>
        <script src="{{ URL::asset('plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js') }}"></script>
        <script src="{{ URL::asset('js/script.js') }}"></script>
    @show
    </body>
</html>
