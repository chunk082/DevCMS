@extends('housekeeping.app')

@section('content')
    <h2>Article Comments</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div style="margin-top: 20px;">
        <table style="width: 100%; border-collapse: collapse;">
            <thead>
                <tr style="background-color: #f4f4f4; text-align: left;">
                    <th style="padding: 10px; border-bottom: 2px solid #ddd;">Article</th>
                    <th style="padding: 10px; border-bottom: 2px solid #ddd;">User</th>
                    <th style="padding: 10px; border-bottom: 2px solid #ddd;">Comment</th>
                    <th style="padding: 10px; border-bottom: 2px solid #ddd;">Posted At</th>
                    <th style="padding: 10px; border-bottom: 2px solid #ddd;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($comments as $comment)
                    <tr style="border-bottom: 1px solid #ddd;">
                        <td style="padding: 10px;">{{ $comment->article_title }}</td>
                        <td style="padding: 10px; font-weight: bold;">{{ $comment->commenter_name }}</td>
                        <td style="padding: 10px;">{{ $comment->comment }}</td>
                        <td style="padding: 10px; color: #888;">{{ $comment->created_at }}</td>
                        <td style="padding: 10px;">
                            <form action="{{ route('housekeeping.articles.comments.destroy', $comment->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Are you sure?')" 
        style="background-color: #e74c3c; color: white; padding: 8px 15px; border: none; cursor: pointer; 
               border-radius: 8px; font-size: 14px; font-weight: bold; transition: 0.3s;">
    Delete
</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" style="padding: 20px; text-align: center; font-style: italic; color: #777;">No comments found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
