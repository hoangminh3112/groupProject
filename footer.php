
    <script src="//code.jquery.com/jquery.js"></script>

    <script>
        $(document).ready(function () {
            $('.btn-delete').click(function (event) {
                event.preventDefault();
                isDelete = confirm('Bạn có chắc chắn muốn xóa bản ghi này ?');
                if (isDelete) {
                    let url = $(this).attr('href');
                    window.location.assign(url);
                }
            })
        })
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</body>
</html>
