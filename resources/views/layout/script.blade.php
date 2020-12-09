<script
    src="https://code.jquery.com/jquery-3.5.1.js"
    integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script>
    $(document).ready(function () {
        $('.btn-del').on('click', function () {
            var redirectUrl = $(this).attr('href');
            Swal.fire({
                title: 'Thông báo!',
                text: "Bạn có chắc muốn xóa?",
                icon: 'success',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Đồng ý'
            }).then((result) => { // arrow function es6 (es2015)
                if (result.value) {
                    window.location.href = redirectUrl;
                }
            });
            return false;
        });
    });

    @if (isset($_GET['msg']))
    Swal.fire({
        position: 'middle-center',
        icon: 'success',
        title: "<?= $_GET['msg'];?>",
        showConfirmButton: false,
        timer: 1500,
    });
    @endif

</script>
@if (session('msg'))
    <script>
        Swal.fire({
            position: 'middle-center',
            icon: 'success',
            title: "{{session('msg')}}",
            showConfirmButton: false,
            timer: 1500,
        });
    </script>
@endif
