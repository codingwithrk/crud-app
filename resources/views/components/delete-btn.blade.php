<form action="{{ route('products.destroy', $id) }}" method="POST"
      style="display:inline;">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger" role="button">Delete</button>
</form>