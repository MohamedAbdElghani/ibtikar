@extends('layouts.app')

@section('content')
@if($old_squad && $old_squad->calendly)
    @include('profile.after_squad')
@else
    @include('profile.before_squad')
@endif
@endsection

@section('scripts')
<script>
(function($) {

		var original_image = $('.BigprofileImg img').attr('src');

		$(".profile-image-input").change(function() {
			var val = $(this).val().toLowerCase(),
	        regex 	= new RegExp("(.*?)\.(jpg|jpeg|png)$");

	        if (!(regex.test(val))) {
	            $(this).val('');
	            alert('برجاء إختيار صورة صالحة.');
	        }

			if (this.files && this.files[0]) {
				var reader = new FileReader();
				$('.BigprofileImg').addClass('remove-image');
				reader.onload = function(e) {
				  $('.BigprofileImg img').attr('src', e.target.result);
				}
				reader.readAsDataURL(this.files[0]);
			}
		});

		$('.remove-span').click(function(){
			$('.BigprofileImg img').attr('src', original_image);
			$(".profile-image-input").val('');
			$('.BigprofileImg').removeClass('remove-image');
		});

})(jQuery);
</script>
@endsection