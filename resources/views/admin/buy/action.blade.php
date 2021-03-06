<a href="{{ url('admin/buy/accepted', ['id' => $buy['id'], 'product' => $buy['product_id']]) }}"
    class="btn bg-success text-white" style="margin-top: 5px;">Accept</a>
<a href="{{ url('admin/buy/rejected', ['id' => $buy['id'], 'product' => $buy['product_id']]) }}"
    class="btn bg-danger text-white" style="margin-top: 5px;">Reject</a>


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script>
    $('button#delete').on('click', function(e){
        e.preventDefault();
        var href = $(this).attr('href');
        Swal.fire({
            title: 'Apakah kamu yakin hapus data ini?',
            text: "Data yang sudah dihapus tidak bisa dikembalikan!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, hapus saja!'
            }).then((result) => {
            if (result.value) {
                document.getElementById('deleteForm').action = href;
                document.getElementById('deleteForm').submit();
                Swal.fire(
                'Terhapus!',
                'Data kamu berhasil dihapus.',
                'success'
                )
            }
        })
    })
</script>