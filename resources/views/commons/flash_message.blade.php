<script>
@if (session('flash_message'))
    $(function () {
        toastr.options = {
            "timeOut": "2000",
            "progressBar": true,
            "positionClass": "toast-top-center",
            "newestOnTop": true,
        }
        toastr.success('{{ session('flash_message') }}');
    });      
@endif
</script>