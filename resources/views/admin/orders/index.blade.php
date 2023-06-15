  <!-- Featured Start -->
  @extends('admin.layouts.app')
  @section('title', 'orders')
  @section('content')

      <div class="card">

          @if (session('message'))
              <h1 class="text-primary">{{ session('message') }}</h1>
          @endif


          <h1>
              Orders
          </h1>
          <div class="container-fluid pt-5">
              @if (session('message'))
                  <h1 class="text-primary">{{ session('message') }}</h1>
              @endif


              <div class="col card">
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

                                  <td>
                                    @can('list-order')
                                        
                                    {{-- <div class="btn-group bootstrap-select"> --}}
                                        <select name="status" class="selectpicker"
                                            data-action="{{ route('admin.orders.update_status', $item->id) }}">
                                            @foreach (config('order.status') as $status)
                                                <option value="{{ $status }}"
                                                    {{ $status ==  $item->status ? 'selected' : '' }}>{{ $status }}
                                                </option>
                                            @endforeach
                                        </select>
                                    {{-- </div> --}}
                                    @endcan
                                  </td>
                                  <td>${{ $item->total }}</td>
                                  <td>${{ $item->ship }}</td>
                                  <td>{{ $item->customer_name }}</td>
                                  <td>{{ $item->customer_email }}</td>
                                  <td>{{ $item->customer_address }}</td>
                                  <td>{{ $item->note }}</td>
                                  <td>{{ $item->payment }}</td>

                              </tr>
                          @endforeach
                      </table>
                      {{ $orders->links() }}
                  </div>
              </div>

          </div>
      </div>
  @endsection
  @section('script')
      <script>
          $(function() {

              $(document).on("change", ".selectpicker", function(e) {
                  e.preventDefault();
                  let url = $(this).data("action");
                  let data = {
                      status: $(this).val()
                  };
                  $.post(url, data, res => {
                      Swal.fire({
                          position: "top-end",
                          icon: "success",
                          title: "success",
                          showConfirmButton: false,
                          timer: 1500,
                      });

                  });
              });

          });
      </script>

  @endsection
