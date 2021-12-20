    </main>
    <footer class="footer mt-auto footer-light">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 small">Copyright &#xA9; <a href="<?php echo base_url() ?>" target="_blank" style="text-decoration: none;">AMIK PGRI KEBUMEN</a> <?php echo date('Y') ?></div>
                <div class="col-md-6 text-md-right small">
                    <a href="#!">Version: 2.0</a>
                </div>
            </div>
        </div>
    </footer>
</div>
</div>
<script src="<?php echo base_url() ?>assets/vendors/datatables/datatables.min.js"></script>
<script src="<?php echo base_url() ?>assets/vendors/cdn.jsdelivr.net/npm/bootstrap%404.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="<?php echo base_url() ?>assets/js/scripts.js"></script>
<script src="<?php echo base_url() ?>assets/vendors/cdn.jsdelivr.net/momentjs/latest/moment.min.js" crossorigin="anonymous"></script>
<script type="text/javascript">
$(document).ready( function () 
{
    $('#table_id').DataTable();
} );
</script>
</body>
</html>