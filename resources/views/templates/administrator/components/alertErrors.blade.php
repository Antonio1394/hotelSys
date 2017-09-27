@if( count($errors) > 0 )
    <script type="text/javascript">
        var alertErrors = '<?php echo json_encode($errors->all(), JSON_HEX_APOS); ?>';
    </script>
@endif

@if( Session::has('error') )
    <script type="text/javascript">
        var alertError = '<?php echo Session::get('error'); ?>';
    </script>
@endif
