<script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="<?= base_url("assets/bootstrap/js/bootstrap.min.js") ?>"></script>
<script src="<?= base_url("assets/datatables/datatables.min.js") ?>"></script>
<script>
    $(document).ready(function() {
        var table = $("#dt").DataTable({
            "dom": '<"top pb-2"i><"py-2"B>rt<"bottom pt-5"f>lp<"clear">',
            "scrollX": true,
            "buttons": ['copy', 'excel', 'pdf']
        });
    })
</script>