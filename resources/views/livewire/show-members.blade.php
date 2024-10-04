<div>

    <table class="table  table-sm " id="myTable" >
        <thead class="table-secondary">
          <td>Member ID</td>
          <td>Member Name</td>
          <td>Date of Birth</td>
          <td>Gender</td>
          <td>Mobile Number</td>
          <td>Weight(kg)</td>
          <td>Height(cm)</td>
          <td>Start Date</td>
          <td>Expire Date</td>
          <td>Status</td>
          <td></td>
          <td></td>
        </thead>
        <tbody>
    @foreach ($members as $member )
    
    <tr >
        <td>{{$member->id}}</td>
        <td><a href="{{route('members.profile',$member->id)}}"> {{$member->name}}</a></td>
        <td>{{$member->dob}}</td>
        <td>{{$member->gender}}</td>
        <td>{{$member->mobile}}</td>
        <td>{{$member->weight}}</td>
        <td>{{$member->height}}</td>
        <td>{{$member->startDate}}</td>
        <td>{{$member->ExpireDate}}</td>
        <td>
        @if ($member->status == 'active')
          <p class="text-success">Active</p>
        @else
          <p class="text-danger">Inactive</p>
        @endif
    
    </td>
        <td>
          <a href="{{route('members.edit',$member->id)}}" class="btn btn-primary btn-sm {{$member->status=='inactive'?'disabled':''}}"  ><i class="lni lni-pencil-alt"></i></button></a>
    
        </td>
        <td>
          <!-- Button trigger modal -->
    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal{{$member->id}}">
      <i class="lni lni-trash-can"></i>
    </button>
    
    <!-- Modal -->
    <div class="modal fade" id="exampleModal{{$member->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Do You Want to Delete This User ID - {{$member->id}}</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
            <form action="{{route('membersdelete.delete',$member->id)}}" method="POST">
              @csrf
              @method('Delete')
            <button type="submit" class="btn btn-danger">Yes</button>
          </form>
          </div>
        </div>
      </div>
    </div>
    </td>  
      </tr>
        
    @endforeach
    
    </tbody>
    </table>
</div>