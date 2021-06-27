<div class="row">
  <div class="col-md-12 profileRightSide">

    <div class="d-flex mb-4 align-items-center">
      <h4 class="headingstyle"> Certificates </h4>
      <a class="editLink uploadCv ml-auto blue-btn d-flex align-items-center show-cert-form">
        <i class="lnir lnir-circle-plus"></i>
        Add New
      </a>
    </div>

    <ul class="jobsList" id="certificate_list">
      @foreach ($certifications as $certificate)
        @php
          $issue_date = strtotime($certificate->issue_date);
          $issue_date = date('M Y',$issue_date);
        @endphp
        @if($certificate->expiration_date)
          @php
            $expiration_date = strtotime($certificate->expiration_date);
            $expiration_date = date('M Y',$expiration_date);
          @endphp
        @endif
        <li id="certificate_id_{{$certificate->id}}">
          <div class="mb-2">
            <h6 class="mb-0 certificate-name">{{$certificate->name}}</h6>
            <p class="hintText mb-0"> Issued <span class="issue_date">{{$issue_date}}</span> 
              <span class="expiration_date">@if($certificate->expiration_date) - {{$expiration_date}} @endif</span></p>
            <p class="hintText mb-0"> <span class="h5">Credential ID : </span> <span class="credential_id">{{$certificate->credential_id}}</span></p>
            <a class="hintText credential_url" href="{{$certificate->credential_url}}" target="_blank"> See Credential </a>
          </div>

          <a class="editLink ml-auto show-cert-form text-right" certificate_name="{{$certificate->name}}" issue_date="{{$issue_date}}"
            expiration_date="{{$certificate->expiration_date}}" credential_id="{{$certificate->credential_id}}" 
            certid="{{$certificate->id}}" credential_url="{{$certificate->credential_url}}" issuing_organization="{{$certificate->issuing_organization}}">
            <i class="lnir lnir-chevron-right"></i>
          </a>
        </li>
      @endforeach
      <li style="display: none">
        <div class="mb-2">
          <h6 class="mb-0 certificate-name"></h6>
          <p class="hintText mb-0 issue_date"> Issued <span class="expiration_date"></span></p>
          <p class="hintText mb-0"> <span class="h5">Credential ID : </span> <span class="credential_id"></span></p>
          <a class="hintText credential_url" href="" target="_blank"> See Credential </a>
        </div>

        <a class="editLink ml-auto show-cert-form text-right">
          <i class="lnir lnir-chevron-right"></i>
        </a>
      </li>
    </ul>
  </div><!-- step 6-->
</div><!-- row end -->

<div class="editBox show-cert-form-box" style="display:none">
  <h5 class="mb-4" id="edit_certificate_title">Edit Certificates</h5>

  <form method="post" class="delete-form-multiple" id="delete_certificate">
    @method('DELETE')
    @csrf
    <input type="hidden" id="delete_certid" name="delete_certid">
    <button type="submit" class="btn" style="color: #0095ff;"><i data-feather="trash-2"></i></button>
  </form>

  <form method="POST" id="edit_certificate_form">
    @csrf
    <input type="hidden" id="certid" name="certid">
    <div class="mb-3 row">
      <div class="col-md-6">
        <label class="col-form-label">Name</label>
        <input id="name" type="text" class="form-control" name="name" required>
      </div><!-- col-md-6 -->

      <div class="col-md-6">
        <label class="col-form-label">Issuing Organization</label>
        <input id="issuing_organization" type="text" class="form-control" name="issuing_organization" required>
      </div><!-- col-md-6 -->
    </div>

    <div class="mb-3 row">
      <div class="col-md-6">
        <label class="col-form-label">Issue Date</label>
        <div class="form-group">
          <div>
            <div class="input-group date mb-3" data-date-format="dd.mm.yyyy">
              <input id="issue_date" type="text" class="form-control" name="issue_date" placeholder="dd.mm.yyyy" required>
              <span class="input-group-addon input-group-text">
                <i class="lnir lnir-calendar"></i>
              </span>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-6">
        <label class="col-form-label">Expiration Date</label>
        <div class="form-group">
          <div>
            <div class="input-group date mb-3" data-date-format="dd.mm.yyyy">
              <input id="expiration_date" type="text" class="form-control" name="expiration_date" placeholder="dd.mm.yyyy" required>
                <span class="input-group-addon input-group-text">
                  <i class="lnir lnir-calendar"></i>
                </span>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="form-check">
      <input class="form-check-input" type="checkbox" value="" id="never_expired">
      <label class="form-check-label" for="never_expired">This credential does not expire</label>
    </div>

    <div class="row">
      <div class="col-md-12 mb-3">
        <label class="col-form-label">Credential ID</label>
        <input id="credential_id" type="text" class="form-control" name="credential_id">
      </div><!-- col-md-12 -->

      <div class="col-md-12 mb-3">
        <label class="col-form-label">Credential URL</label>
        <input id="credential_url" type="url" class="form-control" name="credential_url">
      </div><!-- col-md-12 -->
    </div>

    <div class="row">
      <div class="col-md-12 mt-4">
        <button type="submit" class="btn btn-bp btn-dark">Save</button>
        <a class="btn btn-bp btn-cancel close-cert-form">Cancel</a>
      </div><!-- col-md-12 end-->
    </div><!-- row end-->

    <div class="form-group text-center my-4 w-100">
      <span class="text-success" id="certification_success_message"></span>
    </div>
  </form>
</div><!-- editBox end-->