<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Internship CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="icon" type="image/png" sizes="64x64" href="{{ asset('images/image.png') }}">
    <script src="https://kit.fontawesome.com/f5c1d73bac.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container">

        <div class="mt-2 text-center p-2" style="background: rgb(0, 255, 115);">
            <h1>Internship CRUD</h1>
        </div>

        <div class="mt-2">
            @if (session('Pass'))
                <div class="alert alert-success">{{ session('Pass') }}</div>
            @endif

            @if (session('Error'))
                <div class="alert alert-danger">{{ session('Error') }}</div>
            @endif
        </div>

        <script>
            var res = function() {
                var text = confirm("Bạn có chấp nhận xóa không?");
                return text;
            }
        </script>

        <div class="mt-2">
            <!-- Modal Add-->
            <div class="modal fade" id="ModalAdd" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Add thông tin sản phẩm</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('crud.create') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Nhập Mã Sản Phẩm</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" name="txtMaSanPhams">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Nhập Tên Sản Phẩm</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" name="txtTenSanPhams">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Nhập Số Lượng</label>
                                    <input type="number" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" name="txtSoLuongs">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Nhập Giá Bán</label>
                                    <input type="number" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" name="txtGiaBans">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <button data-bs-toggle="modal" data-bs-target="#ModalAdd" class="btn btn-success mb-2">Add <i
                    class="fa-solid fa-plus"></i></button>
            <table class="table table-success table-striped table-hover text-bold border-dark table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Mã Sản Phẩm</th>
                        <th scope="col">Tên Sản Phẩm</th>
                        <th scope="col">Số Lượng</th>
                        <th scope="col">Giá Bán</th>
                        <th scope="col">Update/Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($datas as $item)
                        <tr>
                            <th>{{ $item->Id }}</th>
                            <th>{{ $item->MaSanPham }}</th>
                            <th>{{ $item->TenSanPham }}</th>
                            <th>{{ $item->SoLuong }}</th>
                            <th>{{ $item->GiaBan }}.VND</th>
                            <td><a href="#" data-bs-toggle="modal"
                                    data-bs-target="#ModalUpdate{{ $item->Id }}" class="btn btn-warning btn-sm"><i
                                        class="fa-regular fa-pen-to-square"></i></a>
                                <a href="{{ route('crud.delete', $item->Id) }}" onclick="return res()"
                                    class="btn btn-danger btn-sm"><i class="fa-regular fa-trash-can"></i></a>
                            </td>

                            <!-- Modal -->
                            <div class="modal fade" id="ModalUpdate{{ $item->Id }}" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Update thông tin
                                                sản phẩm</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('crud.update') }}" method="POST">
                                                @csrf
                                                <div class="mb-3">
                                                    <label for="exampleInputEmail1" class="form-label">Id</label>
                                                    <input type="text" class="form-control"
                                                        id="exampleInputEmail1" aria-describedby="emailHelp"
                                                        name="txtIds" value="{{ $item->Id }}" readonly>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="exampleInputEmail1" class="form-label">Mã Sản
                                                        Phẩm</label>
                                                    <input type="text" class="form-control"
                                                        id="exampleInputEmail1" aria-describedby="emailHelp"
                                                        name="txtMaSanPhams" value="{{ $item->MaSanPham }}">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="exampleInputEmail1" class="form-label">Tên Sản
                                                        Phẩm</label>
                                                    <input type="text" class="form-control"
                                                        id="exampleInputEmail1" aria-describedby="emailHelp"
                                                        name="txtTenSanPhams" value="{{ $item->TenSanPham }}">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="exampleInputEmail1" class="form-label">Số
                                                        Lượng</label>
                                                    <input type="number" class="form-control"
                                                        id="exampleInputEmail1" aria-describedby="emailHelp"
                                                        name="txtSoLuongs" value="{{ $item->SoLuong }}">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="exampleInputEmail1" class="form-label">Giá
                                                        Bán</label>
                                                    <input type="number" class="form-control"
                                                        id="exampleInputEmail1" aria-describedby="emailHelp"
                                                        name="txtGiaBans" value="{{ $item->GiaBan }}">
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Save
                                                        changes</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
