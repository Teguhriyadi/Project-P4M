@php
use Carbon\Carbon;
use App\Models\Model\Profil;
$profil = Profil::first();
// header("Content-Type: application/vnd.msword");
// header("Expires: 0");
// header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
// header("content-disposition: attachment; filename=".$penduduk->nama."doc");
function bulanRomawi($bln)
{
    $bulan = '';
    switch ($bln) {
        case '01':
        $bulan = 'I';
        break;
        case '02':
        $bulan = 'II';
        break;
        case '03':
        $bulan = 'III';
        break;
        case '04':
        $bulan = 'IV';
        break;
        case '05':
        $bulan = 'V';
        break;
        case '06':
        $bulan = 'VI';
        break;
        case '07':
        $bulan = 'VII';
        break;
        case '08':
        $bulan = 'VIII';
        break;
        case '09':
        $bulan = 'IX';
        break;
        case '10':
        $bulan = 'X';
        break;
        case '11':
        $bulan = 'XI';
        break;
        case '12':
        $bulan = 'XII';
        break;
    }

    return $bulan;
}
@endphp
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="{{ url('backend/template/plugins/cetak') }}/960.css" type="text/css" media="screen">
    <link rel="stylesheet" href="{{ url('backend/template/plugins/cetak') }}/print-preview.css" type="text/css" media="screen">
    {{-- <script src="{{ url('backend/template/bower_components/jquery/dist/jquery.min.js') }}"></script> --}}
    <script src="{{ url('backend/template/plugins/cetak') }}/jquery.tools.min.js"></script>
    <style>
        ul {
            list-style: none;
        }

        /* Tables still need 'cellspacing="0"' in the markup. */
        table { border-collapse: separate; border-spacing: 0;  }
        caption, th, td { font-weight: normal; }
        table, td, th { vertical-align: middle; }

        /* Remove possible quote marks (") from <q>, <blockquote>. */
            blockquote:before, blockquote:after, q:before, q:after { content: ""; }
            blockquote, q { quotes: "" ""; }

            /* Remove annoying border on linked images. */
            a img { border: none; }


            .js-enabled hr {
                display: none;
            }

            #content p,  #content-main ul, #content ol, #content dl {
                margin: 0 0 1em;
            }


            /*-- 1.3 Headings --*/
            h1,h2,h3,h4,h5 {
                font-size: 1em;
                font-weight: normal;
                margin: 2em 0 1em;
            }


            /* -- 1.4 Links -- */
            a {
                color: #FCFEFF;
                text-decoration: underline;
            }

            a:hover,
            a:focus {
                color: #FCFEFF;
            }


            /*-- 1.8 Images --*/

            .align-left {
                float: left;
                margin: 0 20px 10px 0;
                padding: 1px;
            }

            .align-right {
                float: right;
                margin: 0 0 10px 20px;
                padding: 1px;
            }




            /*
            --------------------
            3. Content Eelemnts
            --------------------
            */

            #feature {
                position: relative;
                margin: 20px 0;
            }

            #feature > div {
                position:relative;
                margin: 0 -1px;
                overflow:hidden;
                height: 175px;
                width: 620px;
            }

            #feature div.items {
                position:absolute;
                width:20000em;
            }

            #feature div.items div {
                float: left;
            }

            #feature div.items img {
                border: none;
            }

            #feature .next,
            #feature .prev {
                cursor: pointer;
                display: block;
                font-size: 30px;
                line-height: 1;
                position: absolute;
                margin-top: -15px;
                right: -40px;
                top: 50%;
                text-decoration: none;
            }

            #feature .prev {
                left: -35px;
                right: auto;
            }

            #feature a.disabled {
                color: #BBB;
                cursor: auto;
            }


            /* -- 3.X Print preview -- */
            a.print-preview {
                background: url(images/icon-print-preview.png) no-repeat 6% 40%;
                cursor: pointer;
                color:#fff;
                position:fixed;
                top:110px;
                right:0px;
                z-index:300;
                width:90px;
                border:1px solid #ccc;
                border-top-left-radius:4px;
                border-bottom-left-radius:4px;
                background-color:#D74937;
                padding: 0 0 0 35px;
                line-height: 40px;
                font-size: 25px;
                font-weight:bold;
                text-decoration: none;

            }


        </style>
        <script type="text/javascript">
            $(function()
            {
                $("#feature > div").scrollable({interval: 2000}).autoscroll();

                $('#aside').prepend('<a class="print-preview">Cetak </a>');
                $('a.print-preview').printPreview();

                var code = 80;
                $.printPreview.loadPrintPreview();
            });
            /*!
            * jQuery Print Previw Plugin v1.0.1
            *
            * Copyright 2011, Tim Connell
            * Licensed under the GPL Version 2 license
            * http://www.gnu.org/licenses/gpl-2.0.html
            *
            * Date: Wed Jan 25 00:00:00 2012 -000
            */

            (function($) {

                // Initialization
                $.fn.printPreview = function() {
                    this.each(function() {
                        $(this).bind('click', function(e) {
                            e.preventDefault();
                            if (!$('#print-modal').length) {
                                $.printPreview.loadPrintPreview();
                            }
                        });
                    });
                    return this;
                };

                // Private functions
                var mask, size, print_modal, print_controls;
                $.printPreview = {
                    loadPrintPreview: function() {
                        // Declare DOM objects
                        print_modal = $('<div id="print-modal"></div>');
                        print_controls = $('<div id="print-modal-controls">' +
                            '<a href="#" class="print" onclick="cek()" title="Cetak sekarang">Print page</a>' +
                            '<a href="#" class="close" title="Tutup tampilan cetak">Close</a>').hide();
                            var print_frame = $('<iframe id="print-modal-content" scrolling="no" border="0" frameborder="0" name="print-frame" />');

                            // Raise print preview window from the dead, zooooooombies
                            print_modal
                            .hide()
                            .append(print_controls)
                            .append(print_frame)
                            .appendTo('body');

                            // The frame lives
                            for (var i=0; i < window.frames.length; i++) {
                                if (window.frames[i].name == "print-frame") {
                                    var print_frame_ref = window.frames[i].document;
                                    break;
                                }
                            }
                            print_frame_ref.open();
                            print_frame_ref.write('<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">' +
                            '<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">' +
                            '<head><title>' + document.title + '</title></head>' +
                            '<body></body>' +
                            '</html>');
                            print_frame_ref.close();

                            // Grab contents and apply stylesheet
                            var $iframe_head = $('head link[media*=print], head link[media=all]').clone(),
                            $iframe_body = $('body > *:not(#print-modal):not(script)').clone();
                            $iframe_head.each(function() {
                                $(this).attr('media', 'all');
                            });
                            if (!$.browser.msie && !($.browser.version < 7) ) {
                                $('head', print_frame_ref).append($iframe_head);
                                $('body', print_frame_ref).append($iframe_body);
                            }
                            else {
                                $('body > *:not(#print-modal):not(script)').clone().each(function() {
                                    $('body', print_frame_ref).append(this.outerHTML);
                                });
                                $('head link[media*=print], head link[media=all]').each(function() {
                                    $('head', print_frame_ref).append($(this).clone().attr('media', 'all')[0].outerHTML);
                                });
                            }

                            // Disable all links
                            $('a', print_frame_ref).bind('click.printPreview', function(e) {
                                e.preventDefault();
                            });

                            // Introduce print styles
                            $('head').append('<style type="text/css">' +
                                '@media print {' +
                                '/* -- Print Preview --*/' +
                                '#print-modal-mask,' +
                                '#print-modal {' +
                                'display: none !important;' +
                                '}' +
                                '}' +
                                '</style>'
                                );

                                // Load mask
                                $.printPreview.loadMask();

                                // Disable scrolling
                                $('body').css({overflowY: 'hidden', height: '100%'});
                                $('img', print_frame_ref).load(function() {
                                    print_frame.height($('body', print_frame.contents())[0].scrollHeight);
                                });

                                // Position modal
                                starting_position = $(window).height() + $(window).scrollTop();
                                var css = {
                                    top:         starting_position,
                                    height:      '100%',
                                    overflowY:   'auto',
                                    zIndex:      10000,
                                    display:     'block'
                                }
                                print_modal
                                .css(css)
                                .animate({ top: $(window).scrollTop()}, 400, 'linear', function() {
                                    print_controls.fadeIn('slow').focus();
                                });
                                print_frame.height($('body', print_frame.contents())[0].scrollHeight);

                                // Bind closure
                                $('a', print_controls).bind('click', function(e) {
                                    e.preventDefault();
                                    if ($(this).hasClass('print')) { window.print(); }
                                    else { $.printPreview.distroyPrintPreview(); }
                                });
                            },

                            distroyPrintPreview: function() { window.close();
                                print_controls.fadeOut(100);
                                print_modal.animate({ top: $(window).scrollTop() - $(window).height(), opacity: 1}, 400, 'linear', function(){
                                    print_modal.remove();
                                    $('body').css({overflowY: 'auto', height: 'auto'});
                                });
                                mask.fadeOut('slow', function()  {
                                    mask.remove();
                                });

                                $(document).unbind("keydown.printPreview.mask");
                                mask.unbind("click.printPreview.mask");
                                $(window).unbind("resize.printPreview.mask");
                            },

                            /* -- Mask Functions --*/
                            loadMask: function() {
                                size = $.printPreview.sizeUpMask();
                                mask = $('<div id="print-modal-mask" />').appendTo($('body'));
                                mask.css({
                                    position:           'absolute',
                                    top:                0,
                                    left:               0,
                                    width:              size[0],
                                    height:             size[1],
                                    display:            'none',
                                    opacity:            0,
                                    zIndex:             9999,
                                    backgroundColor:    '#000'
                                });

                                mask.css({display: 'block'}).fadeTo('400', 0.75);

                                $(window).bind("resize..printPreview.mask", function() {
                                    $.printPreview.updateMaskSize();
                                });

                                mask.bind("click.printPreview.mask", function(e)  {
                                    $.printPreview.distroyPrintPreview();
                                });

                                $(document).bind("keydown.printPreview.mask", function(e) {
                                    if (e.keyCode == 27) {  $.printPreview.distroyPrintPreview(); }
                                });
                            },

                            sizeUpMask: function() {
                                if ($.browser.msie) {
                                    // if there are no scrollbars then use window.height
                                    var d = $(document).height(), w = $(window).height();
                                    return [
                                    window.innerWidth || 						// ie7+
                                    document.documentElement.clientWidth || 	// ie6
                                    document.body.clientWidth, 					// ie6 quirks mode
                                    d - w < 20 ? w : d
                                    ];
                                } else { return [$(document).width(), $(document).height()]; }
                            },

                            updateMaskSize: function() {
                                var size = $.printPreview.sizeUpMask();
                                mask.css({width: size[0], height: size[1]});
                            }
                        }
                    })(jQuery);
                </script>
            </head>

            <body style="overflow-x: hidden">
                <div id="content" class="container_12 clearfix">
                    <div id="content-main" class="grid_7">
                        <table align="center">
                            <tr>
                                <td><img src="/storage/{{ $profil->gambar }}" width="70" height="70"></td>
                                <td width="500">
                                    <center>
                                        <font size="4" style="text-transform: uppercase">PEMERINTAH KABUPATEN {{ $profil->kabupaten }}</font><br>
                                        <font size="4" style="text-transform: uppercase">KECAMATAN {{ $profil->kecamatan }}</font><br>
                                        <font size="5" style="text-transform: uppercase"><b>DESA {{ $profil->nama_desa }}</b></font><br>
                                        <font size="2">Jl. Raya Arahan, Arahan Lor, Arahan, Kabupaten Indramayu, Jawa Barat 45211</font>
                                    </center>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <hr style="border-top: 2px solid black; margin-bottom: 0; bottom: 0;">
                                </td>
                            </tr>
                        </table>
                        <br>

                        <table align="center">
                            <tr>
                                <td style="text-decoration: underline; font-size: 18px; font-weight: bold; text-transform: uppercase;">
                                    Surat {{ $format->nama }}
                                </td>
                            </tr>
                            <tr>
                                <td align="center">Nomor: {{ $no_surat }}/{{ $format->akronim }}/{{ bulanRomawi(date('m')) }}/{{ date('Y') }}</td>
                            </tr>
                        </table>
                        <br>

                        <table align="center">
                            <tr>
                                <td width="570" align="justify">
                                    Yang bertanda tangan dibawah ini Kepala Desa {{ $profil->nama_desa }}, Kecamatan {{ $profil->kecamatan }}, Kabupaten {{ $profil->kabupaten }}
                                    menerangkan dengan sebenarnya, bahwa:
                                </td>
                            </tr>
                        </table>
                        <br>
                        <table align="center" width="560">
                            <tr>
                                <td>Nama</td>
                                <td>: <b>{{ $penduduk->nama }}</b></td>
                            </tr>
                            <tr>
                                <td>NIK</td>
                                <td>: {{ $penduduk->nik }}</td>
                            </tr>
                            <tr>
                                <td>Jenis Kelamin</td>
                                <td>: {{ $penduduk->getKelamin->nama }}</td>
                            </tr>
                            <tr>
                                <td>Tempat, Tanggal Lahir</td>
                                <td>: {{ $penduduk->tempat_lahir }}, {{ Carbon::createFromFormat('Y-m-d', $penduduk->tgl_lahir)->isoFormat('D MMMM Y') }}</td>
                            </tr>
                            <tr>
                                <td>Warga Negara</td>
                                <td>: {{ $penduduk->getWargaNegara->nama }}</td>
                            </tr>
                            <tr>
                                <td>Agama</td>
                                <td>: {{ $penduduk->getAgama->nama }}</td>
                            </tr>
                            <tr>
                                <td>Pekerjaan</td>
                                <td>: {{ $penduduk->getPekerjaan->nama }}</td>
                            </tr>
                            <tr>
                                <td>Status Pernikahan</td>
                                <td>: {{ $penduduk->getKawin->nama }}</td>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <td width="390">: Dusun {{ $penduduk->getDusun->dusun }}, RT. {{ $penduduk->getRt->rt }} RW. {{ $penduduk->getRw->rw }}, Desa {{ $profil->nama_desa }}, Kecamatan {{ $profil->kecamatan }}, Kabupaten {{ $profil->kabupaten }}, {{ $profil->provinsi }}, {{ $profil->kode_pos }}</td>
                            </tr>
                        </table>
                        <br>
                        <table align="center">
                            <tr>
                                <td width="570" align="justify">
                                    Dengan ini menerangkan bahwa yang bersangkutan adalah warga di Desa {{ $profil->nama_desa }}, Kecamatan {{ $profil->kecamatan }},
                                    Kabupaten {{ $profil->kabupaten }}.
                                    {{ $keterangan }}.
                                    <br>
                                    <br>
                                    {{ $keperluan }}
                                    <br>
                                    <br>
                                    Demikian surat yang keterangan ini dibuat, atas perhatian dan kerjasamanya kami ucapkan terimakasih
                                </td>
                            </tr>
                        </table>
                        <br>

                        <table align="center" width="570">
                            <tr>
                                <td>
                                    <table align="right" width="">
                                        <tr>
                                            <td align="center">{{ $profil->nama_desa }}, {{ Carbon::now()->isoFormat("D MMMM Y") }}</td>
                                        </tr>
                                        <tr>
                                            <td align="center" style="margin-right: 21px;">{{ $jabatan->getJabatan->nama_jabatan }} {{ $profil->nama_desa }}</td>
                                        </tr>
                                        <tr>
                                            <td height="75"></td>
                                        </tr>
                                        <tr>
                                            <td align="center" style="font-weight: bold; text-decoration: underline;">
                                                {{ $pegawai->nama }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="center">NIP. {{ $pegawai->nip }}</td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>

                    </div>
                </div>
                <script>
                    function cek() {
                        console.log("ok");
                    }
                </script>
            </body>

            </html>
