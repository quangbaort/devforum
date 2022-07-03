<script>
    @if(session('success'))
    toastr.success('{{ session('success') }}')
    @endif
    @if($errors->any() || session('error'))
    toastr.error('{{ $errors->first() ?: session('error') }}')
    @endif
</script>
