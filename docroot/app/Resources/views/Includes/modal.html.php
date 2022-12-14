<!-- Modal - myModal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
        <div class="modal-body modal-profile">
            <div class="button-box"><button type="button" class="close" data-dismiss="modal">&times;</button></div>
            <div class="row">
                <div class="col-sm-4">
                    <div id="userImage" style="background-image: url('');" class="image-profile"></div>
                </div>
                <div class="col-sm-8">
                    <div class="title-profile" id="profileName"></div>
                    <div class="job-profile" id="profileJob"></div>
                    <div class="profile-separate"></div>
                    <div class="sub-info-title"><?= $this->t("biodata");?></div>
                    <div class="sub-contain-title" id="profileBio"></div>
                    <div class="sub-info-title"><?= $this->t("riwayat-kerja");?></div>
                    <div class="sub-contain-title" id="profileHistory"></div>
                    <div class="sub-info-title"><?= $this->t("riwayat-pendidikan");?></div>
                    <div class="sub-contain-title" id="profileEducation"></div>
                </div>
            </div>
        </div>
    </div>

  </div>
</div>
<!-- End Modal - myModal -->