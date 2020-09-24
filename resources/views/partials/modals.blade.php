{{-- Errors --}}
<div class="modal fade" id="warnModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white text-center">
                <h5 class="modal-title" id="error_title">Please Confirm</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
                <div class="modal-body">
                    Are you sure you want to delete this record?
                    <form id="deleteForm" onsubmit="event.preventDefault(); executeDeletion();">
                    @csrf
                    <input type="hidden" id="target_url" name="target_url">
                    <input type="hidden" id="target_id" name="target_id">
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-outline-danger btn-sm">Delete</button>
                    <button type="button" class="btn btn-outline-secondary btn-sm" data-dismiss="modal">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{--Messages--}}
<div class="modal fade" id="messageModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form class="form-group" autocomplete="off">
                <div class="modal-header bg-info text-white" id="message_header">
                    <h4 class="modal-title" id="message_title">Message</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body" id="message_body">
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary btn-sm" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{--Profile Picture--}}
<div class="modal fade" id="changePicture" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-success text-white">
          <h5 class="modal-title" id="exampleModalLabel">Update Picture</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form enctype="multipart/form-data" id="picturesForm" autocomplete="off">
            @csrf
            <div class="modal-body">
                <div class="col-md-12">
                    <input type="hidden" name="the_child_id" id="the_child_id">
                    <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text">Upload</span>
                        </div>
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" name="picture"  id="picture" required>
                          <label class="custom-file-label">Choose file</label>
                        </div>
                      </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success">Save</button>
                <button type="reset" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
            </div>
        </form>
      </div>
    </div>
  </div>

{{-- Departments --}}
<div class="modal fade" id="addDepartment">
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header bg-info text-white">
            <h4 class="modal-title" id="department_title">Create Department</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <form autocomplete="off" id="departmentForm">
            <div class="modal-body">
                @csrf
                <div class="form-row">
                    <div class="col-md-12">
                        <label>Department Name:</label>
                        <input type="text" class="form-control" name="department_name" id="department_name">
                        <input type="hidden" name="department_id" id="department_id">
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-3">
                        <label>Code:</label>
                        <input type="text" class="form-control" name="department_code" id="department_code">
                    </div>
                    <div class="col-md-6">
                        <label>Department Head:</label>
                        <select name="department_head" id="department_head" class="form-control">
                            <option value="" selected disabled>-- Choose --</option>
                            @foreach(App\User::all() as  $user)
                            <option value="{{$user->id}}">{{$user->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success btn-sm">Save</button>
                <button type="button" class="btn btn-outline-secondary btn-sm" data-dismiss="modal">Close</button>
            </div>
        </form>
    </div>
</div>
</div>

{{-- User groups --}}
<div class="modal fade" id="addGroup">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="groupsForm" autocomplete="off" class="form-group">
                <div class="modal-header bg-info text-white">
                    <h4 class="modal-title" id="groups_form_heading">Add Group</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    @csrf
                    <div class="form-row">
                        <div class="col-md-8">
                            <label>group Name:</label>
                            <input type="text" class="form-control" name="group_name" id="group_name">
                            <input type="hidden" name="group_id" id="group_id">
                        </div>
                        <div class="col-md-4">
                            <label>Retirement Age:</label>
                            <select type="text" class="form-control" name="retirement_age" id="retirement_age">
                                <option value="" selected disabled>-Select Age-</option>
                                <option value="50">50</option>
                                <option value="55">55</option>
                                <option value="60">60</option>
                                <option value="65">65</option>
                                <option value="70">70</option>
                                <option value="75">75</option>
                            </select>
                        </div>
                        <div class="col-md-12">
                            <label>Description:</label>
                            <input type="text" class="form-control" name="group_description" id="group_description">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" id="groupBtn" class="btn btn-outline-success btn-sm">Save</button>
                    <button type="button" class="btn btn-outline-secondary btn-sm" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>


{{--Documents--}}
<div class="modal fade" id="addDocument" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{url('documents')}}" method="POST" enctype="multipart/form-data" id="documentsForm" autocomplete="off">
                @csrf
                <div class="modal-header bg-info text-white">
                    <h4 class="modal-title"><i class="fa fa-paperclip"></i> Attachments</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">
                    <div class="form-row">
                        <input type="hidden" name="owner_id" id="owner_id">
                        <input type="hidden" name="owner_name" id="owner_name">
                        <div class="col-md-12">
                            <label for="file_description">Filename: </label>
                            <input class="form-control" name="file_name"  id="file_name">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-4">
                            <label for="document_type">Document Type: </label>
                            <select class="form-control {{ $errors->has('document_type') ? ' is-invalid' : '' }}" name="document_type"  id="document_type">
                                <option disabled selected value="">- Choose -</option>
                                <option value="Medical Report">Medical Report</option>
                                <option value="Case Report">Case Report</option>
                                <option value="Proposal">Proposal</option>
                                <option value="Transcript">Transcript</option>
                            </select>
                        </div>
                        <div class="col-md-8">
                            <label for="document">Attach File: </label>
                            <input type="file" class="form-control {{ $errors->has('document') ? ' is-invalid' : '' }}" name="document"  id="document">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-12">
                            <label for="file_description">Description: </label>
                            <input class="form-control {{ $errors->has('file_description') ? ' is-invalid' : '' }}" name="file_description"  id="file_description">

                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-outline-success btn-sm">Save</button>
                    <button type="button" class="btn btn-outline-secondary btn-sm" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{--Comments--}}
<div class="modal fade" id="addComments" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <form class="form-group" id="commentsForm" autocomplete="off">
                <div class="modal-header bg-info text-white">
                    <h4 class="modal-title" id="comment_title">Add Comment</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">
                    @csrf
                    <div class="form-row">
                        <div class="col-md-12">
                            <input type="hidden" name="comment_id" id="comment_id">
                            <input type="hidden" name="commentable_type" id="commentable_type">
                            <input type="hidden" name="commentable_id" id="commentable_id">
                            <label for="comment">Comment</label>
                            <textarea name="comment_body" id="comment_body" rows="2" class="form-control"></textarea>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-outline-success btn-sm">Save</button>
                    <button type="button" class="btn btn-outline-secondary btn-sm" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>


{{-- Register Users --}}
<div class="modal fade bd-example-modal-lg" id="addUser" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form class="form-group" id="userForm" autocomplete="off">
                @csrf
                <div class="modal-header bg-success text-white">
                    <h4 class="modal-title">User Registration</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                            <div class="form-row">
                                <input type="hidden" id="user_id" name="user_id">
                                <div class="col-md-4">
                                    <label>Staff ID Number</label>
                                    <input type="text" name="staff_id" id="staff_id" class="form-control" placeholder="ABC/000/000">
                                </div>
                                <div class="col-md-4">
                                    <label>Firstname</label>
                                    <input type="text" name="firstname" id="firstname" class="form-control" placeholder="Firstname">
                                </div>
                                <div class="col-md-4">
                                    <label>Lastname</label>
                                    <input type="text" name="lastname" id="lastname" class="form-control" placeholder="Lastname">
                                </div>
                                <div class="col-md-4">
                                    <label>Gender</label>
                                    <br>
                                    <select type="text" name="user_gender" id="user_gender" class="form-control">
                                        <option value="" selected disabled>-- Select --</option>
                                        @foreach(['Female','Male'] as  $gender)
                                            <option value="{{$gender}}">{{$gender}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label>Mobile Phone</label>
                                    <input type="tel" name="mobile_phone" id="mobile_phone" class="form-control">
                                </div>
                                <div class="col-md-4">
                                    <label>Email</label>
                                    <input type="email" name="email" id="email" class="form-control" placeholder="Email">
                                </div>
                                <div class="col-md-4">
                                    <label>Password</label>
                                    <input type="password" name="password" id="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="Password">
                                    @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                    <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="col-md-4">
                                    <label>Confirm Password</label>
                                    <input type="password" name="password_confirmation" id="password-confirm" class="form-control" placeholder="Confirm Password">

                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-4">
                                    <label>Department</label>
                                    <select name="the_department" id="the_department" class="form-control">
                                        <option value="" selected disabled>Choose...</option>
                                        @foreach(App\Department::all() as  $department)
                                        <option value="{{$department->id}}">{{$department->department_code}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label>Title</label>
                                    <select name="the_title"  id="the_title" class="form-control">
                                        <option value="" selected disabled>Choose...</option>
                                        @foreach(App\Title::all() as  $title)
                                        <option value="{{$title->id}}">{{$title->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label>User group</label>
                                    <select name="the_group"  id="the_group" class="form-control">
                                        <option value="" selected disabled>-- Choose --</option>
                                        @foreach(App\Group::all() as  $group)
                                        <option value="{{$group->id}}">{{$group->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        <input type="hidden" name="account_status" id="account_status"  value="Active">
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success btn-sm">Save</button>
                    <button type="reset" class="btn btn-outline-secondary btn-sm" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- Assign Staff --}}
<div class="modal fade" id="addStaff" tabindex="-1"  role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="staffForm" class="form-group" autocomplete="off">
                <div class="modal-header text-center">
                    <h4 class="modal-title">Assign Staff</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="the_partner_id" name="partner_id">
                    @csrf
                    <div class="form-row">
                        <div class="col-md-8">
                            <label>Select Staff</label>
                            <div class="form-group mb-3">
                                <select class="form-control" id="the_user_id" name="user_id">
                                    <option value="" disabled selected>Choose Staff</option>
                                    @foreach(App\User::all() as $user)
                                    <option value="{{ $user->id }}">{{ $user->lastname }} {{ $user->firstname }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-sm btn-outline-success btn-sm" id="saveStaff">Save</button>
                    <button type="button" class="btn btn-outline-secondary btn-sm" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>


{{--Events--}}
<div class="modal fade" id="addEvent" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form class="form-group" id="eventForm" autocomplete="off">
                <div class="modal-header bg-info text-white" id="event_header">
                    <h4 class="modal-title" id="event_title">Create Event</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    @csrf
                    <div class="form-row">
                        <div class="col-md-12">
                            <label>Event Name:</label>
                            <input type="text" class="form-control" name="event_name" id="event_name">
                            <input type="hidden" name="event_id" id="event_id">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-12">
                            <label>Location:</label>
                            <input type="text" class="form-control" name="event_location" id="event_location">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-5">
                            <label>Event Date:</label>
                            <input type="date" class="form-control" name="event_date" id="event_date">
                        </div>
                        <div class="col-md-7">
                            <label>Status:</label>
                            <input type="text" class="form-control" name="event_status" id="event_status">
                        </div>
                    </div>
                        <div class="form-row">
                        <div class="col-md-12">
                            <label>Description:</label>
                            <input type="text" class="form-control" name="event_description" id="event_description">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success btn-sm">Save</button>
                    <button type="button" class="btn btn-outline-secondary btn-sm" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{--Titles--}}
<div class="modal fade" id="addTitle" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form class="form-group" id="titleForm" autocomplete="off">
                <div class="modal-header bg-info text-white" id="title_header">
                    <h4 class="modal-title" id="title_title">Add Title</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    @csrf
                    <div class="form-row">
                        <div class="col-md-12">
                            <label>Title Name:</label>
                            <input type="text" class="form-control" name="title_name" id="title_name">
                            <input type="hidden" name="title_id" id="title_id">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-12">
                            <label>Description:</label>
                            <input type="text" class="form-control" name="title_description" id="title_description">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success btn-sm">Save</button>
                    <button type="button" class="btn btn-outline-secondary btn-sm" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{--Children--}}
<div class="modal fade" id="addChild">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form class="form-group" id="childForm" autocomplete="off">
                <div class="modal-header bg-success text-white" id="child_header">
                    <h4 class="modal-title" id="child_title">Add Child</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div id="child_page">
                    <fieldset>
                        <legend>Child information</legend>
                        <div class="form-row">
                            <input type="hidden" id="child_id">
                            <div class="col-md-3">
                                <label>Admission Number</label>
                                <input type="text" name="admission_number" id="admission_number" class="form-control" placeholder="000/0000/000">
                            </div>
                            <div class="col-md-6">
                                <label>Fullname</label>
                                <input type="text" name="child_name" id="child_name" class="form-control" placeholder="Name of the child">
                            </div>
                            <div class="col-md-3">
                                <label>Gender</label>
                                <select type="text" id="child_gender" name="child_gender" class="custom-select">
                                    <option value="" selected disabled> --Select-- </option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label>Birthdate</label>
                                <input type="date" id="birth_date" name="birth_date" class="form-control">
                            </div>
                            <div class="col-md-3">
                                <label>Birth Order</label>
                                <input type="number" id="birth_order" name="birth_order" class="form-control">
                            </div>
                            <div class="col-md-3">
                                <label>Clan</label>
                                <input type="text" id="clan" name="clan" class="form-control">
                            </div>
                            <div class="col-md-3">
                                <label>Religion</label>
                                <input type="text" id="religion" name="religion" class="form-control">
                            </div>
                            <div class="col-md-3">
                                <label>Totem</label>
                                <input type="text" id="totem" name="totem" class="form-control">
                            </div>

                            <div class="col-md-3">
                                <label>Admission Date</label>
                                <input type="date" id="admission_date" name="admission_date" class="form-control">
                            </div>
                        </div>
                    </fieldset>
                    <fieldset>
                        <legend>Parents information</legend>
                        <div class="form-row">
                            <div class="col-md-6">
                                <label>Mother's name</label>
                                <input type="text" id="mother" name="mother" class="form-control">
                            </div>
                            <div class="col-md-3">
                                <label>Is mother alive</label>
                                <select type="text" id="mother_alive" name="mother_alive" class="custom-select">
                                    <option value="" selected disabled> --Select-- </option>
                                    <option value="No">No</option>
                                    <option value="Yes">Yes</option>
                                    <option value="Maybe">Maybe</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label>Mother's contact</label>
                                <input type="tel" id="mother_phone" name="mother_phone" class="form-control">
                            </div>
                        </div>
                        <div class="form-row">
                        <div class="col-md-6">
                            <label>Father's name</label>
                            <input type="text" id="father" name="father" class="form-control">
                        </div>
                        <div class="col-md-3">
                            <label>Is father alive</label>
                            <select type="text" id="father_alive" name="father_alive" class="custom-select">
                                <option value="" selected disabled> --Select-- </option>
                                <option value="No">No</option>
                                <option value="Yes">Yes</option>
                                <option value="Maybe">Maybe</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label>Father's contact</label>
                            <input type="tel" id="father_phone" name="father_phone" class="form-control">
                        </div>
                    </div>
                    </fieldset>
                </div>
                <div id="info_page">
                    <fieldset>
                        <legend>Other details</legend>
                        <div class="form-row">
                            <div class="col-md-3">
                                <label>Was child abandoned?</label>
                                <select type="text" id="abandoned" name="abandoned" class="custom-select">
                                    <option value="" selected disabled> --Select-- </option>
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select>
                            </div>
                            {{-- <span id="if_abandoned"> --}}
                                <div class="col-md-3">
                                    <label>Village</label>
                                    <input type="text"  name="village" id="village" class="form-control">
                                </div>
                                <div class="col-md-3">
                                    <label>Parish</label>
                                    <input type="text"  name="parish" id="parish" class="form-control">
                                </div>
                                <div class="col-md-3">
                                    <label>Sub-County</label>
                                    <input type="text"  name="subcounty" id="subcounty" class="form-control">
                                </div>
                                <div class="col-md-3">
                                    <label>District</label>
                                    <input type="text"  name="district" id="district" class="form-control">
                                </div>
                                <div class="col-md-9">
                                    <label>Circumstances under which the child was found </label>
                                    <textarea type="text"  name="circumstances" id="circumstances" class="form-control"></textarea>
                                </div>
                                <div class="col-md-4">
                                    <label>Reason for admission </label>
                                    <input type="text"  name="admission_reason" id="admission_reason" class="form-control">
                                </div>
                                <div class="col-md-4">
                                    <label>Health conditions  </label>
                                    <input type="text"  name="health_condtition" id="health_condtition" class="form-control">
                                </div>
                                <div class="col-md-4">
                                    <label>Care order number</label>
                                    <input type="text"  name="care_order" id="care_order" class="form-control">
                                </div>
                                <div class="col-md-4">
                                    <label>Presiding magistrate</label>
                                    <input type="text"  name="presiding_magistrate" id="presiding_magistrate" class="form-control">
                                </div>
                                <div class="col-md-4">
                                    <label>Duration of stay</label>
                                    <input type="number"  name="duration" id="duration" class="form-control">
                                </div>
                                <div class="col-md-4">
                                    <label>Duration type</label>
                                    <select name="duration_type" id="duration_type" class="custom-select">
                                        <option value="Days">Days</option>
                                        <option value="Weeks">Weeks</option>
                                        <option value="Months">Months</option>
                                        <option value="Years">Years</option>
                                    </select>
                                </div>
                            {{-- </span> --}}
                        </div>
                    </fieldset>
                </div>
                <div id="guardian_page">
                    <fieldset>
                        <legend>Guardian</legend>
                        <div class="form-row">
                            <div class="col-md-4">
                                <label>Name</label>
                                <input type="text" name="guardian_name" id="guardian_name" class="form-control" placeholder="Guardian's Fullname">
                            </div>
                            <div class="col-md-8">
                                <label>Address</label>
                                <input type="text"  name="guardian_address" id="guardian_address" class="form-control" placeholder="Village, Parish and / or District">
                            </div>
                            <div class="col-md-6">
                                <label>Relationship with Child</label>
                                <select type="text" id="relationship" name="relationship" class="custom-select">
                                    <option value="" selected disabled> --Select-- </option>
                                    <option value="Parent">Parent</option>
                                    <option value="Sibling">Sibling</option>
                                    <option value="Caregiver">Caregiver</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label>Contact</label>
                                <input type="tel"  name="guardian_contact" id="guardian_contact" class="form-control">
                            </div>
                        </div>
                    </fieldset>
                    <fieldset>
                        <legend>Local Council Referee</legend>
                        <div class="form-row">
                            <div class="col-md-4">
                                <label>Name</label>
                                <input type="text" name="council_name" id="council_name" class="form-control" placeholder="Fullname">
                            </div>
                            <div class="col-md-4">
                                <label>Address</label>
                                <input type="text"  name="council_address" id="council_address" class="form-control" placeholder="Village, Parish and / or District">
                            </div>
                            <div class="col-md-4">
                                <label>Phone Contact</label>
                                <input type="tel"  name="council_phone" id="council_phone" class="form-control" placeholder="+256712345678">
                            </div>
                        </div>
                    </fieldset>
                </div>
                <div class="modal-footer mt-2">
                    <div class="btn-group btn-group">
                        <button type="button" class="btn btn-success" id="process_child">Next</button>
                        <button type="button" class="btn btn-outline-secondary" id="back_to_child">Back</button>
                        <button type="button" class="btn btn-outline-secondary" id="back_to_info">Back</button>
                        <button type="button" class="btn btn-success" id="process_info">Next</button>
                        <button type="button" class="btn btn-success" id="process_guardian">Next</button>
                        <button type="submit" class="btn btn-success" id="save_child">Save</button>
                        <button type="submit" class="btn btn-success" id="update_child">Update</button>
                        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

{{--Visits--}}
<div class="modal fade" id="addVisit">
    <div class="modal-dialog">
        <div class="modal-content">
            <form class="form-group" autocomplete="off" id="visitForm">
                <div class="modal-header bg-info text-white" id="visit_header">
                    <h4 class="modal-title" id="visit_title">Add Visit</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="partner_id" id="visited_partner">
                    <input type="hidden" name="visit_id" id="visit_id">
                    <div class="form-row">
                        <div class="col-md-4">
                            <label>Date of the visit</label>
                            <input type="date" id="visit_date" name="visit_date" class="form-control">
                        </div>
                        <div class="col-md-8">
                            <label>Main reason for the visit</label>
                            <input type="text" id="visit_reason" name="visit_reason" class="form-control">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-12">
                            <label>Discussions</label>
                            <textarea type="text" name="visit_discussion" id="visit_discussion" class="form-control" rows="3"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-outline-success btn-sm">Save</button>
                    <button type="button" class="btn btn-outline-secondary btn-sm" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>
