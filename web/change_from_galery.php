<?php
include('./config/apply.php');

$tbl_name = 'gambar_profil';
$where = "id = '1'";

$query = $obj->select_data($tbl_name, $where);
$res = $obj->execute_query($conn, $query);
$row=$obj->fetch_data($res);
// echo $row['file'];
// exit();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--==================== UNICONS ====================-->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <!--==================== SWIPER CSS ====================-->
    <link rel="stylesheet" href="./assets/css/swiper-bundle.min.css">

    <!--==================== CSS ====================-->
    <link rel="stylesheet" href="./assets/css/styles.css">

    <title>kelas pintar</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/dropzone/dist/dropzone.css" />
    <link href="https://unpkg.com/cropperjs/dist/cropper.css" rel="stylesheet" />
    <script src="https://unpkg.com/dropzone"></script>
    <script src="https://unpkg.com/cropperjs"></script>
</head>

<body>
    <!--==================== HEADER ====================-->
    <header class="header" id="header">
    </header>

    <!--==================== MAIN ====================-->
    <main class="main">
        <!--==================== ABOUT ====================-->
        <section class="about" id="about">
            <!-- <h2 class="section__title">About Me</h2>
                <span class="section__subtitle">My Introduction</span> -->
            <div class="about__container grid">
                <div class="header__title">
                    <a href="./index.php" class="back__icon">
                        <i class="uil uil-angle-left button__icon"></i>
                    </a>
                    <h2 class="section__title">Potong Gambar</h2>
                </div>
                <form method="post">
                    <label for="upload_image">
                        <img src="<?= !empty($row['file']) ? $row['file']  : './upload/user.jpg'?>" id="uploaded_image" class="image__from-galery" />
                        <div class="overlay">
                            <div class="text">Click to Change Profile Image</div>
                        </div>
                        <input type="file" name="image" class="image" id="upload_image" style="display:none" />
                    </label>
                </form>
                <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Crop Image Before Upload</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="img-container">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <img src="" id="sample_image" />
                                        </div>
                                        <div class="col-md-4">
                                            <div class="preview"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" id="crop" class="btn btn-primary">Crop</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <form action="upload.php" method="post">
            <div class="footer__section">
                <a href="./index.php">
                    <button type="submit" name="submit" class="button__simpan">Simpan</button>
                </a>
            </div>
        </form>
    </main>

    <!--==================== FOOTER ====================-->

    <!--==================== SCROLL TOP ====================-->
    <!-- <a href="#" class="scrollup" id="scroll-up">
        <i class="uil uil-arrow-up scrollup__icon"></i>
    </a> -->

    <!--==================== SWIPER JS ====================-->
    <script src="./assets/js/swiper-bundle.min.js"></script>
    <!--==================== script upload ====================-->
    <script>
        $(document).ready(function() {

            var $modal = $('#modal');

            var image = document.getElementById('sample_image');

            var cropper;

            $('#upload_image').change(function(event) {
                var files = event.target.files;

                var done = function(url) {
                    image.src = url;
                    $modal.modal('show');
                };

                if (files && files.length > 0) {
                    reader = new FileReader();
                    reader.onload = function(event) {
                        done(reader.result);
                    };
                    reader.readAsDataURL(files[0]);
                }
            });

            $modal.on('shown.bs.modal', function() {
                cropper = new Cropper(image, {
                    aspectRatio: 1,
                    viewMode: 3,
                    preview: '.preview'
                });
            }).on('hidden.bs.modal', function() {
                cropper.destroy();
                cropper = null;
            });

            $('#crop').click(function() {
                canvas = cropper.getCroppedCanvas({
                    width: 400,
                    height: 400
                });

                canvas.toBlob(function(blob) {
                    url = URL.createObjectURL(blob);
                    var reader = new FileReader();
                    reader.readAsDataURL(blob);
                    reader.onloadend = function() {
                        var base64data = reader.result;
                        $.ajax({
                            url: 'upload.php',
                            method: 'POST',
                            data: {
                                image: base64data
                            },
                            success: function(data) {
                                $modal.modal('hide');
                                $('#uploaded_image').attr('src', data);
                            }
                        });
                    };
                });
            });

        });
    </script>
    <!--==================== MAIN JS ====================-->
    <script src="./assets/js/main.js"></script>
</body>

</html>