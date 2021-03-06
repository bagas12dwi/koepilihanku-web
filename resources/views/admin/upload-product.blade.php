@extends('layout.layout-admin')

@section('konten')
<button type="button" class="btn btn-success mb-4" data-bs-toggle="modal" data-bs-target="#inputModal">Tambahkan Produk</button>

<div class="card shadow mb-4">
  <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Data Produk</h6>
  </div>
  <div class="card-body">
      <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                    <th scope="col" style="display: none">ID</th>
                    <th scope="col">Produk</th>
                    <th scope="col">Nama Produk</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Action</th>
                </tr> 
                <tbody>
                    @foreach ($productsTable as $produk)
                    <tr>
                        <td style="vertical-align: middle; width: 5%; display:none;" scope="row">
                          {{ $produk->id }}
                        </td>
                        <td style="width: 10%; vertical-align: middle">
                          <div class="text-center">
                              <img src="{{ asset('storage/foto-produk/'. $produk->gambar) }}" width="100px" alt="" />
                          </div>
                        </td>
                        <td class="fw-bold text-uppercase" style="vertical-align: middle">{{ $produk->nama }}</td>
                        <td style="vertical-align: middle">@currency($produk->harga)</td>
                        <td style="vertical-align: middle; width: 40%">
                          <div class="row">
                            <div class="col-md-6 d-flex justify-content-end">
                              <a class="btn btn-primary text-uppercase" href="/product-admin/update/{{ $produk->id }}" style="width: 100px">Update</a>
                            </div>
                            <div class="col-md-6 d-flex justify-content-start">
                                <form action="/hapus-produk" method="POST">
                                  @csrf
                                  <input type="hidden" name="id" id="id" value="{{ $produk->id }}">
                                  <button onclick="return confirm('Apakah anda yakin menghapus data ini?')" class="btn btn-danger text-uppercase" style="width: 100px">Hapus</button>
                                </form> 
                            </div>
                          </div>
                        </td>
                      </tr>
                    @endforeach
                </tbody>
              </thead>
          </table>
      </div>
      <div class="d-flex justify-content-end">
        {{ $productsTable->links() }}
      </div>
  </div>
</div>
@endsection

@include('components.modal-update-product')


