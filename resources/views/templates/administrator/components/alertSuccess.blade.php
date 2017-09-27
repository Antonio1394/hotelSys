@if( Session::has('message') )
    <script type="text/javascript">
        var alertSuccess = '<?php echo Session::get('message'); ?>';
    </script>
@endif
