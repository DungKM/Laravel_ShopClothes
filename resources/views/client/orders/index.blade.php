  <!-- Featured Start -->
  @extends('client.layouts.app')
  @section('title', 'Home')
  @section('content')
      <div class="container-fluid pt-5">
          @if (session('message'))
              <h1 class="text-primary">{{ session('message') }}</h1>
          @endif


          <div class="col">
              <div>
                  <table class="table table-hover">
                      <tr>
                          <th>#</th>

                          <th>status</th>
                          <th>total</th>
                          <th>ship</th>
                          <th>customer_name</th>
                          <th>customer_email</th>
                          <th>customer_address</th>
                          <th>note</th>
                          <th>payment</th>


                      </tr>

                      @foreach ($orders as $item)
                          <tr>
                              <td>{{ $item->id }}</td>

                              <td>{{ $item->status }}</td>
                              <td>${{ $item->total }}</td>

                              <td>${{ $item->ship }}</td>
                              <td>{{ $item->customer_name }}</td>
                              <td>{{ $item->customer_email }}</td>

                              <td>{{ $item->customer_address }}</td>
                              <td>{{ $item->note }}</td>
                              <td>{{ $item->payment }}</td>
                              <td>
                                  @if ($item->status == 'pending')
                                      <form action="{{ route('client.orders.cancel', $item->id) }}"
                                          id="form-cancel{{ $item->id }}" method="post">
                                          @csrf
                                          <button class="btn btn-cancel btn-danger" data-id={{ $item->id }}>Cancle
                                              Order</button>
                                      </form>
                                  @endif

                              </td>
                          </tr>
                      @endforeach
                  </table>
                  {{ $orders->links() }}
              </div>
          </div>

      </div>
  @endsection
  @section('script')
      <script>
          $(function() {

              $(document).on("click", ".btn-cancel", function(e) {
                  e.preventDefault();
                  let id = $(this).data("id");
                  confirmDelete()
                      .then(function() {
                          $(`#form-cancel${id}`).submit();
                      })
                      .catch();
              });

          });
      </script>

  @endsection
