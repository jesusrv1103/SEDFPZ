<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expediente extends Model
{
    protected $table="expediente";

    protected $dates = ['fecha_recepcion','fecha_asignacion_analista','fecha_terminacion'];

    public function cedula(){
        return $this->belongsTo(Cedula::class,'id_cedula','id_cedula');
    }


    public function turnado(){
        return $this->belongsTo(Turnado::class,'id_turnado','id_turnado');
    }

    public function municipio(){
        return $this->belongsTo(Municipio::class,'id_municipio','id_municipio');
    }

    public function productoCredito(){
        return $this->belongsTo(ProductoCredito::class,'id_procredito','id_procredito');
    }

    public function sector(){
        return $this->belongsTo(Sector::class,'id_sector','id_sector');
    }

    public function estatus(){
        return $this->belongsTo(Estatus::class,'id_estatus','id_estatus');
    }

    public function ventanilla(){
        //municipio
        return $this->belongsTo(Municipio::class,'ventanilla','id_municipio');

    }

    public function visita(){
        return $this->belongsTo(VisitaPrevia::class,'id_visita','id_visita');

    }

    public function solicitanteNacionalidad(){
        return $this->belongsTo(Nacionalidad::class,'genesol_nacionalidad','id_nacionalidad');

    }

    public function repLegalNacionalidad(){
        return $this->belongsTo(Nacionalidad::class,'relegal_nacionalidad','id_nacionalidad');

    }

    public function garanteHipNacionalidad(){
        return $this->belongsTo(Nacionalidad::class,'garhipo_nacion','id_nacionalidad');

    }

    public function conyRepresanteLegalNacionalidad(){
        return $this->belongsTo(Nacionalidad::class,'conyrepleg_nacionalidad','id_nacionalidad');

    }

    public function conyAvalNacionalidad()
    {
        return $this->belongsTo(Nacionalidad::class,'conav_nacionyaval','id_nacionalidad');

    }

    public function banco(){
        return $this->belongsTo(Banco::class,'id_banco','id_banco');

    }

    public function capturista(){
        return $this->belongsTo(Usuario::class,'sistema_captura','id_usuario');

    }
    

    public function scopeEstatus($query,$idEstatus){
        if($idEstatus){
            return $query->where('id_estatus','=',$idEstatus);
        }
    }

    public function scopeProgramas($query,$idPrograma){
        if($idPrograma){
            return $query->where('id_estatus','=',$idPrograma);
        }
    }

}
