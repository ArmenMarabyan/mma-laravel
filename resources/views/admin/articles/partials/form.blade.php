<div class="row">
	<div class="col-lg-12">
		<div class="form-group">
			<label for="">Название статьи</label>
			<input type="text" class="form-control" name="name" placeholder="Заголовок продукта" value=" {{ old('name') }}">
		</div>

		<div class="form-group">
			<label for="description">Короткое описание статьи</label>
			<textarea class="form-control" id="description" name="short_description">{{old('short_description')}}</textarea>
		</div>

		<div class="form-group">
			<label for="description">Полное описание статьи</label>
			<textarea class="form-control" id="description" name="description">{{old('description')}}</textarea>
		</div>
		

		<div class="form-group">
			<label for="">Тип статьи</label>
			<select name="main_article" class="form-control" id="">
				<option value="0">Простая статья</option>
				<option value="1">Статья для слайдера</option>

			</select>
		</div>

		<div class="form-group">
				<label for="">source</label>
				<input type="text" class="form-control" name="source" placeholder="source" value="{{ old('source') }}">
		</div>

		<div class="row">

			<div class="form-group col-lg-3">
				<label for="">Мета заголовок</label>
				<input type="text" class="form-control" name="meta_title" placeholder="Мета заголовок" value="{{ old('meta_title') }}">
			</div>

			<div class="form-group col-lg-3">
				<label for="">Мета описание</label>
				<input type="text" class="form-control" name="meta_description" placeholder="Мета описание" value="{{ old('meta_description') }}">
			</div>

			<div class="form-group col-lg-5">
				<label for="">Ключевые слова</label>
				<input type="text" class="form-control" name="meta_keyword" placeholder="Ключевые слова" value="{{ old('meta_keyword') }}">
			</div>
		</div>

		<div class="form-group">
			<label for="">Alias</label>
		  	<input type="text" readonly="" class="form-control" name="alias" placeholder="Автоматическая генерация" value="{{ old('alias') }}">
		</div>

		<div class="form-group">
			<label for="">Картинки</label>
			<input type="file" name="image" id= "file" class="filestyle image" data-buttonText="asdasd" data-classButton="btn btn-primary">
		</div>

	</div>

</div>

<div id="list">
	<div id="uploaded_img">
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