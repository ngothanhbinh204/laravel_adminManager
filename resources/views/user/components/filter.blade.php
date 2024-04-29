<div class="row fillter p-4">
    <div class="col-sm-12 col-lg-6 my-auto">
        <div class="filter align-items-center">
            <select class="form-control" name="perpage" id="">
                @for ($i = 20; $i < 200; $i += 5)
                    <option value="{{ $i }}">{{ $i }} bản ghi
                    </option>
                @endfor
            </select>
        </div>
    </div>
    <div class="col-12 col-lg-6">
        <div class="action">
            <div class="d-flex align-items-center">
                <select class="form-control " name="user_catalogue_id" id="">
                    <option value="0">Chọn nhóm thành viên</option>
                    <option value="1">Quản trị viên</option>
                </select>
                <input name="keyword" class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <span class="align-items-center my-auto">
                    <button type="submit" name="search" value="search" class="btn btn-primary btn-sm">Tìm
                        Kiếm</button>
                </span>

            </div>
        </div>
    </div>
</div>
