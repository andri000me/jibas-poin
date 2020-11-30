<!--
* Name : e-Poin v.1.0
* Author : DEDE ISKANDAR
* Github : https://github.com/ddiskandar
* Facebook : https://www.facebook.com/dzulqarnayn
* Email : d3215k@gmail.com
* WA/Telegram : +62 856 2402 8940
*
* Description: Aplikasi e-Poin ini dibuat dan dikembangkan bertujuan membantu sekolah
* dalam mencatat poin pelanggaran dan kebaikan peserta didik untuk pendidikan
* karakter generasi penerus bangsa yang lebih baik.
*
* Donasi : Support developer untuk terus mengembangkan aplikasi
* dengan memberikan donasi pengembangan.
*
-->

<!-- Main Footer -->
<footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
        ePoin Versi 1.0.0
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2020 Dede Iskandar.</strong> All rights reserved.
</footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="<?php echo base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url(); ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="<?php echo base_url(); ?>assets/plugins/chart.js/Chart.min.js"></script>
<!-- Toastr -->
<script src="<?php echo base_url(); ?>assets/plugins/toastr/toastr.min.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url(); ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>assets/dist/js/adminlte.min.js"></script>



<script type="text/javascript">
    $(document).ready(function() {

        $('#rombel').change(function() {
            var id = $(this).val();
            $.ajax({
                url: "<?php echo base_url(); ?>index.php/surat/get_siswa",
                method: "POST",
                data: {
                    id: id
                },
                async: false,
                dataType: 'json',
                success: function(data) {
                    var html = '';
                    var i;
                    html += '<option value=""> - Pilih salah satu - </option>';
                    for (i = 0; i < data.length; i++) {
                        html += '<option value = "' + data[i].id + '">' + data[i].nama + '</option>';
                    }
                    $('.siswa').html(html);

                }
            });
        });

        $('#jenis_poin').change(function() {
            var id = $(this).val();
            $.ajax({
                url: "<?php echo base_url(); ?>index.php/poin/get_jenis_poin",
                method: "POST",
                data: {
                    id: id
                },
                async: false,
                dataType: 'json',
                success: function(data) {
                    var html = '';
                    var i;
                    html += '<option value=""> - Pilih salah satu - </option>';
                    for (i = 0; i < data.length; i++) {
                        html += '<option value = "' + data[i].id + '">' + '(' + data[i].nilai + ') ' + data[i].nama_poin + '</option>';
                    }
                    $('.poin').html(html);

                }
            });
        });

    });
</script>

<script>
    $(function() {
        $("#siswa").DataTable({
            "responsive": true,
            "autoWidth": false,
            "order": [
                [0, "desc"]
            ]
        });

        $("#walikelas").DataTable({
            "responsive": true,
            "autoWidth": false,
            "order": [
                [0, "asc"]
            ]
        });

    });
</script>

<script>
    var ctx = document.getElementById('statsPoin').getContext('2d');
    var nama_bulan = [];
    var pelanggaran = [];
    var kebaikan = [];


    $.post("<?php echo base_url('dashboard/get_stats') ?>",
        function(data) {
            var obj = JSON.parse(data);
            $.each(obj, function(test, item) {
                nama_bulan.push(item.nama_bulan);
                kebaikan.push(item.kebaikan);
                pelanggaran.push(item.pelanggaran);
            });

            var statsPoin = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: nama_bulan,
                    datasets: [{
                            label: 'Pelanggaran',
                            data: pelanggaran,
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.2)'
                            ],
                            borderColor: [
                                'rgba(169, 48, 62, 1)'
                            ],
                            borderWidth: 1
                        },
                        {
                            label: 'Kebaikan',
                            data: kebaikan,
                            backgroundColor: [
                                'rgba(40, 167, 69, 0.2)'
                            ],
                            borderColor: [
                                'rgba(36, 150, 62, 1)'
                            ],
                            borderWidth: 1
                        }
                    ]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });


        }
    );
</script>

<script type="text/javascript">
    <?php if ($this->session->flashdata('success')) { ?>
        toastr.success('<?php echo $this->session->flashdata('success'); ?>')
    <?php } else if ($this->session->flashdata('delete')) { ?>
        toastr.error('<?php echo $this->session->flashdata('delete'); ?>')
    <?php } ?>
</script>

</body>

</html>