</section>
<!-- <section class="addWorkEntry"> -->
<form action="addWorkEntry.php" method="post" enctype="multipart/form-data">
<fieldset>
<legend>Add Artwork</legend>

<div class="addArtworkContainer">
<div class="imageUpload">
    <div class="imageUploadPreview">
    </div>
    <div class="imageUploadForms">
        <label for="fileID">Select image:</label>
        <input type="file" id="fileID" name="file" accept="image/*">
    </div>
    <div class="imageUploadForms">
        <label for="workTitleID">Image Title</label>
        <input type="text" name="workTitle" id="workTitleID" />
        <input type="submit" name="submit" value="Upload Image" />
    </div>
</div>

<div class="imageFormEntries">
    <div class="imageUpload">
        <label for="artworkDescriptionID">Work Description</label>
        <textarea id="artworkDescripstionID" name="artworkDescription"></textarea>
    </div>
</div>
</div>

</fieldset>
</form>
<!-- </section> -->
<div class="submitEntry">
<input type="submit" value="submit entry">
</div>