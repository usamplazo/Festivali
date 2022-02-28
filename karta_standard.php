
<div style="padding: 200px 200px;">
    <div class="text-center">
        <h1 style="font-family: fantasy;">KARTA</h1>
    </div>
    <div class="row">
        <div class="well col-xs-10 col-sm-10 col-md-6 col-xs-offset-1 col-sm-offset-1 col-md-offset-3">
            <div class="row">
                </span>
                <div class="col-md-4"></div>
                <div class="col-md-6">
                    <table class="table table-hover text-white">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th class="text-center">Naziv festivala</th>
                                <th class="text-center">Grad</th>
                                <th class="text-center">Lokacija</th>
                                <th class="text-center">Datum Pocetaka</th>
                                <th class="text-center">Datum Kraja</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="col-md-9"><em><?php echo $sss['karta_id']; ?></em></h4>
                                </td>
                                <td class="col-md-9"><em><?php echo $sss['naziv']; ?></em></h4>
                                </td>
                                <td class="col-md-1" style="text-align: center"><?php echo $sss['grad']; ?></td>
                                <td class="col-md-1 text-center"><?php echo $sss['naziv_lokacije']; ?></td>
                                <td class="col-md-1 text-center"><?php echo date("d/m/Y", strtotime($sss['datum_pocetka'])); ?></td>
                                <td class="col-md-1 text-center"><?php echo date("d/m/Y", strtotime($sss['datum_kraja'])); ?></td>
                            </tr>
                            <tr>
                                <td>   </td>
                                <td></td>
                                <td></td>
                                <td>
                                    <h4><strong>Cena:</strong></h4>
                                </td>
                                <td class="text-right">
                                    <h4><strong>2000</strong></h4>
                                </td>
                                <td class="text-center text-danger">
                                    <h4><strong>RSD</strong></h4>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-2"></div>
            </div>
        </div>
    </div>