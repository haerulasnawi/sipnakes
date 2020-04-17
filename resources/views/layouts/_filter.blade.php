<form id="search_form">
    <div class="form-row">
      <div class="form-group col-md-4">
        <label for="full_name">Profesi</label>
        {{-- <select name="full_name" id="full_name" class="form-control">
          <option value="">Pilih Profesi</option>
          @foreach ($jnakes as $jnakes)                
            <option value="{{$jnakes->id}}">{{$jnakes->nama_jnakes}}</option>
          @endforeach              
        </select> --}}
        <input type="text" name="full_name" id="full_name" class="form-control">
      </div>
      {{-- <div class="form-group col-md-4">
        <label for="inputFaskes">Fasilitas Kesehatan</label>
        <select name="inputFaskes" id="inputFaskes" class="form-control">              
          <option value="">Pilih Fasilitas Kesehatan</option>
          @foreach ($faskes as $faskes)                
            <option value="{{$faskes->nama_faskes}}">{{$faskes->nama_faskes}}</option>
          @endforeach 
        </select>
      </div> --}}
      <div class="form-group col-md-4">
        <label for="gender">Jenis Kelamin</label>
        <select name="gender" id="gender" class="form-control">
          <option value="">Pilih Jenis Kelamin</option>
          <option value="L">Laki-laki</option>
          <option value="P">Perempuan</option>
        </select>
        {{-- <input type="text" name="gender" id="gender" class="form-control"> --}}
      </div>
    </div>
    <div class="form-row">
      <div class="col-12">
        <div class="card-footer text-right">
          <button id="cari" class="btn btn-primary btn-lg" type="submit">Cari</button>
          <button id="reset" class="btn btn-secondary btn-lg" type="reset">Reset</button>
        </div>
      </div>
    </div>
  </form>