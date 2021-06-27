<!-- video modal -->
<div class="modal fade" id="video-edit" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
  <div class="modal-dialog modal-lg">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="myModalLabel">Upload a 1 min video for you  </h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <i class="lnil lnil-close"></i>
              </button>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-md-12">
                <video controls id="video_source">
                  <source src="{{$resume->camera_time ? url('/').'/storage/'.$resume->camera_time : '#'}}" type="video/mp4">
                </video>
                <p class="text-success" style="display: none;" id="deleted-message">Video deleted successfully</p>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <form method="post" id="delete_video_form" @if(!$resume->camera_time) style="display:none;" @endif
              onsubmit="return confirm('Do you really want to delete this video?');">
              @method('DELETE')
              @csrf
              <button type="submit" class="btn btn-bp btn-danger">Delete Video</button>
            </form>
            <button type="button" class="btn btn-bp btn-cancel" data-dismiss="modal">Close</button>
          </div>
      </div>
  </div>
</div>

<!-- upload video modal -->
<div class="modal fade" id="video-upload" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="myModalLabel">Upload a 1 min video for you  </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <i class="lnil lnil-close"></i>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12 mb-5">
            <form id="dropzoneFormVideo" class="dropzone" action="{{ route('employee_resume.build.camera_time.store') }}">
              @csrf
              <div class="dz-message">
                <div class="fsp-select-labels">
                  <div class="fsp-drop-area__title fsp-text__title"> Select Video to Upload </div> 
                  <div class="fsp-drop-area__subtitle fsp-text__subheader"> or Drag and Drop Video. Accepted files .mp4,.mov,.avi and .flv </div>
                </div>
              </div>
            </form>
            <div class="text-center mt-3">
              <button type="button" class="action next btn blue-btn ctrl-standard is-reversed typ-subhed fx-sliderIn btn-block" id="submit_video_file">Upload</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>