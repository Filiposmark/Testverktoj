<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <script src="includes/PapaParse-5.0.2/papaparse.min.js"></script>
    <script src="https://use.fontawesome.com/releases/v5.15.1/js/all.js"></script>
    <script src=https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js></script>
</head>
<body>
<div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="basic-addon1">
        <i class="fas fa-users"></i>
    </span>
  </div>
  <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
</div>
    <input type="file" id="upload-file" accept=".csv">
    <button id="upload-btn">Upload fil</button>
    <script type="text/javascript">
        let upload = document.getElementById("upload-btn").addEventListener('click', () => {
            Papa.parse(document.getElementById("upload-file").files[0], {
                header: true,
                download: true,
                dynamicTyping: true,
                encoding: "UTF-8",
                complete: function(results) {
                    console.log(results.data);
                    let information = JSON.stringify(results.data);
                    $.ajax({
                        url: "recieve.php",
                        data: information,
                        type: 'post',
                        success: function(data) {
                            console.log(data);
                        }
                    });
                }
            });
        });
    </script>
</body>
</html>