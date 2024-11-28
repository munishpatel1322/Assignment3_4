<table>
    <tr>
        <th>File Name</th>
        <th>File Type</th>
        <th>Upload Date</th>
        <th>Actions</th>
    </tr>
    @foreach($files as $file)
    <tr>
        <td>{{ $file->file_name }}</td>
        <td>{{ $file->file_type }}</td>
        <td>{{ $file->created_at }}</td>
        <td>
            <form action="{{ route('files.destroy', $file->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>


