<div class="row">
	<div class="col-lg-6">
		<div class="form-group">
			<label for="">Имя</label>
			<input type="text" class="form-control" name="name" placeholder="Имя" value="{{old('name')}}">
		</div>

		<div class="form-group">
			<label for="description">Описание</label>
			<textarea class="form-control" id="description" name="description">{{old('description')}}</textarea>
		</div>

		<div class="form-group">
			<label for="">Ник</label>
			<input type="text" class="form-control" name="nickname" placeholder="nickname" value="{{old('nickname')}}">
		</div>

		<div class="form-group">
			<label for="">nationality</label>
			<input type="text" class="form-control" name="nationality" placeholder="nationality" value="{{old('nationality')}}">
		</div>

		<div class="form-group">
			<label for="">date</label>
			<input type="text" class="form-control" name="date" placeholder="date" value="{{old('date')}}">
		</div>

		<div class="form-group">
			<label for="">height</label>
			<input type="text" class="form-control" name="height" placeholder="height" value="{{old('height')}}">
		</div>

		<div class="row">

			<div class="form-group col-lg-3">
				<label for="">Мета заголовок</label>
				<input type="text" class="form-control" name="meta_title" placeholder="Мета заголовок" value="{{old('meta_title')}}">
			</div>

			<div class="form-group col-lg-3">
				<label for="">Мета описание</label>
				<input type="text" class="form-control" name="meta_description" placeholder="Мета описание" value="{{old('meta_description')}}">
			</div>

			<div class="form-group col-lg-6">
				<label for="">Ключевые слова</label>
				<input type="text" class="form-control" name="meta_keyword" placeholder="Ключевые слова" value="{{old('meta_keyword')}}">
			</div>
		</div>

		<div class="form-group">
			<label for="">Alias</label>
			<input type="text" readonly="" class="form-control" name="alias" placeholder="Автоматическая генерация" value="alias">
		</div>

		<div class="form-group">
			<label for="">Картинки</label>
			<input type="file" name="image" id= "file" class="filestyle image" data-buttonText="asdasd" data-classButton="btn btn-primary">
		</div>

	</div>
	<div class="col-lg-6">
		<div class="form-group">
			<label for="">arm_span</label>
			<input type="text" class="form-control" name="arm_span" placeholder="arm_span" value="{{old('arm_span')}}">
		</div>
		<div class="form-group">
			<label for="">w_category</label>
			<input type="text" class="form-control" name="w_category" placeholder="w_category" value="{{old('w_category')}}">
		</div>
		<div class="form-group">
			<label for="">insta</label>
			<input type="text" class="form-control" name="insta" placeholder="insta" value="{{old('insta')}}">
		</div>
		<div class="form-group">
			<label for="">tw</label>
			<input type="text" class="form-control" name="tw" placeholder="tw" value="{{old('tw')}}">
		</div>
		<div class="form-group">
			<label for="">wins</label>
			<input type="text" class="form-control" name="wins" placeholder="wins" value="{{old('wins')}}">
		</div>
		<div class="form-group">
			<label for="">loses</label>
			<input type="text" class="form-control" name="loses" placeholder="loses" value="{{old('loses')}}">
		</div>
		<div class="form-group">
			<label for="">not_heald</label>
			<input type="text" class="form-control" name="not_heald" placeholder="not_heald" value="{{old('not_heald')}}">
		</div>
	</div>

</div>

<div id="list">
	<div id="uploaded_img" style="width: 150px; height: 150px;">
		<img id="image_upload_preview" src="http://placehold.it/800x500" alt="" >
	</div>
</div>
<input type="submit" class="btn btn-primary" value="Сохранить">
<div id="div" class="d-flex"></div>


<script>
	function readURL(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();

			reader.onload = function (e) {

				$('#image_upload_preview').attr('src', e.target.result);
			}

			reader.readAsDataURL(input.files[0]);
		}
	}
	$("#file").change(function () {
		readURL(this);
	});
</script>