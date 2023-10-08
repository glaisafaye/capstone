<?php include '../includes/layout.php'; ?>

  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-10">
        <div class="container my-5">
          <div class="text-center mb-5">
            <div class="col-md-7 mx-auto">
              <div class="card">
                <div class="card-header">
                  <div class="btn-group">
                    <a class="btn btn-outline-info mr-2" href="/mis/reports/reports.php" role="button">Certificate Report</a>
                    <a class="btn btn-outline-info mr-2" href="/mis/reports/reports1.php" role="button">Assistance</a>
                  </div>
                  <h4 style="font-size: 24px; margin-bottom: 20px; margin-top: 30px;">Recommended Residents List</h4>
                  <a class="btn btn-outline-primary btn-sm" href="javascript:void(0);" onclick="openAssistanceList()" role="button">First Batch List</a>
                  <a class="btn btn-outline-primary btn-sm" href="javascript:void(0);" onclick="openAssistanceList2()" role="button">Second Batch List</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
    <script>
        function openAssistanceList() {
            var url = 'assistancelist.php';
            var popupWindow = window.open(url, 'AssistanceListPopup', 'width=800,height=600');
            if (window.focus) {
                popupWindow.focus();
            }
        }

        function openAssistanceList2() { 
            var url = 'assistancelist2.php';
            var popupWindow = window.open(url, 'AssistanceListPopup', 'width=800,height=600');
            if (window.focus) {
                popupWindow.focus();
            }
        }
    </script>

