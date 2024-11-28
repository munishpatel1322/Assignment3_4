<form action="{{ route('uploads.bulk') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <label for="file">Choose CSV, JSON, or XML File:</label>
    <input type="file" name="file" required>
    <button type="submit">Upload</button>
</form>
