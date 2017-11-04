<?php

# No direct access
$secureSrcClassName  = 'WCFE\Modules\Editor\Model\EmergencyRestore';
( class_exists( $secureSrcClassName ) && ( get_class( $this ) == $secureSrcClassName ) ) or die( 'Access Denied' );

$data = array();

$data[ 'secureKey' ] 	= '74652a8da691c410173bc51a56c8a69e';
$data[ 'backupFileHash' ] 	= 'c092c7b7c87731f85ad916222c667f65';

$data[ 'absPath' ] 	= '/var/www/html/wordpress';
$data[ 'contentDir' ] 	= '/var/www/html/wordpress/wp-content/wcfe-4f645dd2cbccd6c4dfac2b7282beea97';

$data[ 'timeCreated' ] 	= 1509551681;

$data[ 'privateKey' ] = 'a*nx:?QMR)Y2)T%h;<=>(g>?%nu`Tx[r1Xj_f&4E0hNMmez%w|e{F1[O<%Z<5dNYO|Ba7C|VO}hEkS6!DWxj*o9:a^$Q9t@YzHL>y%t{n9%f_ C%p~nda6M{A 2&G=^b8O=+4 p[t30@QpSH^^?{;*R&jk6r#xn] ~t4z1:]@0{^I~p.y!U]Iz6jDwq~hN?0GMJ&?eSyILG([)c$zfxt$0~3t/CA!9ITp]k:_l.m*{ 08~!k3H}%7!&e#b{}amQ99-;/VIe5eMp7bt,*tug.VNa[,+qBbVtdlFz:Lf]Fy,|`{WlV/768d:jsF?jH#[V&R,C~ofQn!tgH<[?aYzmr*|&ObO7^_eVsv)[LCZQyn[>gWRt_UG+*caj^adkWhmOsK<U.4c7Jv:VSLNdzY3fJ rUGp jlw4ht#ve0vf#(,z*{p65/ulX}y)KbepzUn&<-+Q.#t;P8p;jMh3jYOOTvvDfLh>dZQ@jZsx<SHDMV}nYj/x0I%l&nD]6dq~Iyt0cN';

return $data;