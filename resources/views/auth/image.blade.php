<table id="datatablesSimple">
    <thead>
        <tr>
            <th>Name</th>
        </tr>
    </thead>
  
    <tbody>
        @foreach ($images as $item)
        <tr>
            {{-- <td>
                <img src="{{ asset('images/' . $item->image) }}">
            </td> --}}
            <td>
                <img src="{{ asset($item->filename) }}" width= '50' height='50' class="img img-responsive" />
            </td>
        </tr>
       
        @endforeach
    </tbody>
</table>