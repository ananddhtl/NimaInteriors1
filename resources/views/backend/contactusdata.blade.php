@extends('backend.include.main')
@section('content')
<div class="container-fluid">

    <div class="py-3 py-lg-4">
        <div class="row">
            <div class="col-lg-6">
                <h4 class="page-title mb-0">Contact US Data</h4>
            </div>
            <div class="col-lg-6">
                <div class="d-none d-lg-block">
                    <ol class="breadcrumb m-0 float-end">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Contact US</a></li>
                        <li class="breadcrumb-item active">List</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Toast Notifications -->
    <div class="toast-container position-fixed bottom-0 end-0 p-3">
        @if(session('success'))
        <div class="toast align-items-center text-bg-success border-0 show" role="alert" aria-live="assertive"
            aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body">
                    {{ session('success') }}
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                    aria-label="Close"></button>
            </div>
        </div>
        @endif

        @if(session('error'))
        <div class="toast align-items-center text-bg-danger border-0 show" role="alert" aria-live="assertive"
            aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body">
                    {{ session('error') }}
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                    aria-label="Close"></button>
            </div>
        </div>
        @endif
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">


                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead>
                                <tr>

                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Phone Number</th>
                                    <th>Email</th>
                                    <th>Street Number</th>
                                    <th>Post Code and City</th>
                                    <th>I am</th>
                                    <th>Project</th>
                                    <th>Message</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $item)
                                <tr>
                                    <th>{{$item->fname}}</th>
                                    <th>{{$item->lname}}</th>
                                    <th>{{$item->phonenumber}}</th>
                                    <th>{{$item->email}}</th>
                                    <th>{{$item->streetno}}</th>
                                    <th>{{$item->postcodeandcity}}</th>
                                    <th>{{$item->iam}}</th>
                                    <th>{{$item->project}}</th>
                                    <th>{{$item->message}}</th>
                                    <td>
                                        @if($item->reply_sent)
                                        <button class="btn btn-secondary" disabled>Email Sent</button>
                                        @else
                                        <button class="btn btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#replyModal-{{ $item->id }}">Reply</button>
                                        @endif
                                      

                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div> <!-- end card -->
        </div> <!-- end col -->


    </div>
    <!--- end row -->
  <!-- Reply Modal -->
                                      
                                        <!-- End Reply Modal -->

  <!-- Modals for reply -->
  @foreach($data as $item)
  <div class="modal fade" id="replyModal-{{ $item->id }}" tabindex="-1" aria-labelledby="replyModalLabel" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content">
              <form action="{{ route('contact.reply', $item->id) }}" method="POST">
                  @csrf
                  <div class="modal-header">
                      <h5 class="modal-title" id="replyModalLabel">Reply to {{ $item->fname }}</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                      <div class="mb-3">
                          <textarea class="form-control" name="reply" rows="4" required></textarea>
                      </div>
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary">Send Reply</button>
                  </div>
              </form>
          </div>
      </div>
  </div>
  @endforeach

</div>
@endsection