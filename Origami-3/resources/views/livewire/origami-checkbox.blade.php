
<form>
    <div class="mb-0">
        <select class="form-select form-control" aria-label="Default select example" id="Sortbylist-job" wire:model="column">
            <option value="name">Sort By Name, Search Change According To Sort</option>
            <option value="category.name">Sort By Category</option>
            <option value="users.name">Sort By Admin</option>
        </select>
    </div>

    <div class="mb-0">
        <select class="form-select form-control" aria-label="Default select example" id="Sortbylist-job" wire:model="sortBy">
            <option value="asc">Order By ASC</option>
            <option value="desc">Order By DESC</option>
        </select>
    </div>

    <div class="widget">
        <div class="input-group mb-3 border rounded">
            <input type="text" class="form-control border-0" wire:model="search" placeholder="Search Keywords...">
        </div>
    </div>

    <button wire:click.prevent="editSelected()">Edit Selected</button> 

    <table class="table table-bordered table-striped">
        <thead>
            <tr>   
                <th><input wire:model="selectAll" type="checkbox"></th>
                <th>Intro Image</th>
                <th>Name</th>
                <th>Category</th>
                <th>URL</th>
                <th>Admin In Charge</th>                                  
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        
        <tbody>
                @foreach ($ori as $origami)
                    <tr>
                        <td>
                            <input wire:model="selectedOrigami" type="checkbox" value="{{ $origami->id }}" >
                        </td>
                        
                        <td> <img src=" {{ file_exists('images/'.$origami->intro_image)? asset('images/'.$origami->intro_image) : $origami->intro_image }} " height="50px" width="50px"> </td>

                        <td> {{ $origami->name }} </td>

                        <td> {{ $origami->category_name }} </td>

                        @if ($origami->url == null)
                            <td> No Url </td>
                        @else
                            <td> {{$origami->url}} </td>
                        @endif

                        <td> {{ $origami->user_name }} </td>
                        

                        <td> <a href="{{ route('admin.origami.edit', ['id' => $origami->id]) }}">Edit</a> </td>
                        <td><a href="{{ route('admin.origami.destroy', ['id' => $origami->id]) }}" onclick="return acceptDelete()">Delete</a></td>
                    </tr> 
                @endforeach
        </tbody>    
    </table>
    {{ $ori->links('bootstrap-4') }}
</form>


