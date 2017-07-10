<main>
    <div class="container">
        <div class="section" style="padding:0;">
            <div class="row">
                <nav class="breadcrumb-nav col s12 truncate N/A transparent z-depth-0" style="height:20px; line-height: 20px; padding:0;">
                    <a class="breadcrumb" href="<?php echo base_url() ?>">Dashboard</a>
                    <a class="breadcrumb" href="<?php echo base_url("ANROC_Jurusan")?>">Data Jurusan</a>
                    <a class="breadcrumb" href="<?php echo base_url("ANROC_Jurusan/Program_Keahlian")?>">Data Program Keahlian</a>
                    <a class="breadcrumb" href="#">Tambah Data Program Keahlian</a>
                </nav>                   
            </div>
        </div>
        <div class="row z-depth-2">
            <div class="col s12">
                <blockquote><h3>Tambah Data Program Keahlian</h3></blockquote>
                <hr>
            </div>
            <div class="col s12">
                <form onsubmit="return validasi(this, 'program')" action="<?php echo base_url("ANROC_Program/save") ?>" method="post">
                    <table>
                        <tbody id="multiple-form">
                            <tr id="index-1">
                                <td>Nama Program Keahlian 1</td>
                                <td class="row">
                                    <div class="col s10">
                                        <input type="text" name="program_keahlian[]" class="program_keahlian">
                                    </div>
                                    <div class="col s2 change">
                                        <button class="btn-floating btn-medium center green trigger" value="index-1"><i class="material-icons">add</i></button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td id="trigger-submit" colspan="2" class="right-align"><button class="btn" type="submit" name="type" value="insert">Tambah Data</button></td>
                            </tr>
                        </tfoot>
                    </table>
                </form>
            </div>
        </div>
    </div>
</main>

<script>
    var hitung = 1;
    $(function(){
       $('#multiple-form').on('click', '.trigger', function(){
            hitung++;
            var id = $(this).val();
            $('#multiple-form').append(
                '<tr id="index-'+hitung+'"><td>Nama Program Keahlian '+hitung+'</td><td class="row"><div class="col s10"><input type="text" name="program_keahlian[]" class="program_keahlian"></div><div class="col s2"><button class="btn-floating btn-medium center green trigger" value="index-'+hitung+'"><i class="material-icons">add</i></button></div></td></tr>'
            );
            $(this).replaceWith(
                '<button class="btn-floating btn-medium center red trigger-delete" value="'+id+'"><i class="material-icons">delete</i></button>'
            );
       }),
       $('#multiple-form').on('click', '.trigger-delete', function(){
            var id = $(this).val();
            var element = document.getElementById(id);
            element.parentNode.removeChild(element);    
       })
    });
</script>