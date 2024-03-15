        <!-- Footer -->
        <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Pró-Reitoria de Extensão - UFCA 2024</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->
  
  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <!-- <script src="js/demo/chart-area-demo.js"></script> -->
  <!-- <script src="js/demo/chart-pie-demo.js"></script> -->
  <!-- <script type="module" src="commons/index.js"></script> -->

  <!-- Page level plugins -->
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/datatables-demo.js"></script>

  <!-- FUNÇÃO PARA RECEBER SOMENTE NUMEROS -->
  <script>
    function verificaNumero(e) {
            if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
                return false;
            }
        }
        $(document).ready(function() {
        $("#num_tombo").keypress(verificaNumero);
        $("#cpf_solicitante").keypress(verificaNumero);
        $("#telefone_solicitante").keypress(verificaNumero);
        $("#cnpj_prestador").keypress(verificaNumero);
        $("#telefone_prestador").keypress(verificaNumero);
        $("#telefone_credor").keypress(verificaNumero);
    });
  </script>

  <script src="https://igorescobar.github.io/jQuery-Mask-Plugin/js/jquery.mask.min.js"></script>       
  <script>
    $('.telefone').mask('(00) 0 0000-0000');
    $('.dinheiro').mask('#.##0,00', { reverse: true });
    $(".cpf").mask("000.000.000-00");
    $(".cnpj").mask("00.000.000/0000-00");
  </script>
  <!-- <input type="text" name="telefone" class="telefone form-control" placeholder="(17) 9 9173-3578" /> -->
  <!-- <label for="dinheiro">R$</label><input type="text" id="dinheiro" name="dinheiro" class="dinheiro form-control" style="display:inline-block" /> -->

</body>

</html>