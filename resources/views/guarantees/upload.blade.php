<form action="{{ route('guarantees.bulkUpload') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <label for="file">Upload File (CSV, JSON, or XML):</label>
    <input type="file" name="file" id="file" required>
    <button type="submit">Upload</button>
</form>
