@extends('layouts.admin')
@section('content')

<div class="content">
    <div class="page-inner">
        <div class="page-header">
            <a href="{{ route('pelanggan.pengambilanSampel.index') }}"><i class="fas fa-arrow-left"> Kembali</i></a>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header justify-content-between d-flex d-inline">
                        <h4 class="card-title">{{ $pengambilan_order->nomor_pre }}</h4>
                        <a href="{{ route('pelanggan.pengambilanSampel.cetakInvoice', $pengambilan_order->id) }}" target="_blank"><i class="btn btn-sm btn-primary shadow-sm">Cetak Invoice</i></a> 
                    </div>
               
                        <div class="col-md-2 mr-auto mt-2">
                            @if ($pengambilan_order->bukti_bayar)
                            @if ($pengambilan_order->id_status_pengambilan_sampel <= 4)
                            <a href="#" data-toggle="modal" data-id="{{ $pengambilan_order->id }}" data-tanggal="{{ $pengambilan_order->tanggal_bayar }}" data-target="#bukti"><i>Edit Bukti</i></a>
                            @endif
                            <a href="{{  Storage::url($pengambilan_order->bukti_bayar)  }}" target="_blank" class="btn btn-info shadow-sm btn-sm">Lihat Bukti Pembayaran</a>
                            @else
                            Sudah Bayar? 
                            <a href="#" data-toggle="modal" data-id="{{ $pengambilan_order->id }}" data-tanggal="{{ $pengambilan_order->tanggal_bayar }}" data-target="#bukti"><i class="btn btn-sm btn-primary shadow-sm">Kirim Bukti Pembayaran</i></a>
                            @endif
                        </div>
                  
                    <div class="card-body">
                        <table class="table2" style="width:100%; padding-left: 25px; padding-right: 25px; padding-bottom: 8px;">
                            <tr style="font-size: 12px;">
                                <td class="th2" colspan="3" style="border-bottom: 1px solid rgba(0,0,0,0);"><b>{{ $pengambilan_order->nama_pemesan }}</b><br>{{ $pengambilan_order->alamat }}<br>{{ $pengambilan_order->no_hp }}<br>{{ $pengambilan_order->email }}</td>
                                <td class="th2" style="width:31%; border-bottom: 1px solid rgba(0,0,0,0);"><b>Tanggal Order:</b> {{ date('d M Y', strtotime($pengambilan_order->tanggal_isi)) }}<br><br><b>Status Order:</b><span style="font-size: 13px; color:#808080">&nbsp;
                                @if ($pengambilan_order->statusPengambilanSampel->id <= 4)
                                    Belum Bayar
                                @else
                                    Sudah Bayar
                                @endif
                                
                                
                                </span></td>
                            </tr>
                        </table>
                    
                        <table class="table2" style="width:100%; padding-left: 25px; padding-right: 25px; padding-bottom: 8px;">
                            <tr>
                                <td class="th2" colspan="4" style="font-size: 14px;"><b>Silahkan Transfer Ke:</b>
                                <br>
                                <b>Bank Kalbar</b>
                                <br>
                                Nomor Rekening : <b>1001013501</b>
                                <br>
                                Atas nama : <b>BEND PENERIMAAN DLH KOTA PTK</b>
                                
                                </td>
                            </tr>
                        </table>
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Jenis Sampel</th>
                                    <th scope="col">Jumlah Titik Sampling</th>
                                    <th scope="col" align="right">Harga</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 1;
                                @endphp

                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $pengambilan_order->sampelUji->nama_sampel }}</td>
                                    <td>
                                       x {{ $pengambilan_order->jumlah_titik_sampling }} titik sampling
                                    </td>
                                    <td align="right">@currency($pengambilan_order->total_harga)</td>
                                </tr>
                          
                                <tr>
                                    <td colspan="4" align="right">Sub Total <b>@currency($pengambilan_order->total_harga)</b></td>
                                </tr>
                            </tbody>
                        </table>
                        <table class="table2" style="width:100%; padding-left: 25px; padding-right: 25px; padding-bottom: 8px;">
                            <tr>
                                <td class="td2" colspan="4" style="font-size: 11px;"><b>Catatan</b><br>Harap membayar sesuai dengan total tagihan, yaitu sebesar @currency($pengambilan_order->total_harga) <br>- -</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="bukti" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{ route('pelanggan.pengambilanSampel.buktiPembayaran') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="hidden" name="id">
                <div class="modal-header">
                    <h5 class="modal-title"><span>Upload</span> Bukti Pembayaran</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="tanggal_bayar">Tanggal Kirim (sesuai struk pembayaran dari bank/ATM)</label>
                        <input type="datetime-local" class="form-control @error('tanggal_bayar') is-invalid @enderror" id="tanggal_bayar" name="tanggal_bayar" required>
                        @error('tanggal_bayar')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="bukti_bayar">Upload Bukti Pembayaran (PDF/Jpeg/Jpg)</label>
                        <input type="file" class="form-control @error('file') is-invalid @enderror" id="bukti_bayar" name="bukti_bayar" required>
                        @error('bukti_bayar')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success">Simpan</button>
                </div>
            </form>
        </div>  
    </div>
</div>


@endsection

@push('scripts')
<script>
    $("#bukti").on('show.bs.modal', (e) => {
        var id = $(e.relatedTarget).data('id');
        var tanggal = $(e.relatedTarget).data('tanggal');
        
        $('#bukti').find('input[name="id"]').val(id);
        $('#bukti').find('input[name="tanggal_bayar"]').val(tanggal);
    });
    
</script>
@endpush