<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header text-white bg-success"> <i class="fa fa-book"></i> Cursos</div>
                    <div class="card-body">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-success mb-2" data-toggle="modal" data-target="#exampleModal" @click="nuevo">
                            <i class="fa fa-plus"></i> Nuevo Curso
                        </button>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nombre</th>
                                    <th>Fecha</th>
                                    <th>Detalle</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(i, index) in certificados" :key="index">
                                    <td>{{index+1}}</td>
                                    <td>{{i.nombre}}</td>
                                    <td>{{i.fecha}}</td>
                                    <td>
<!--                                        {{i.detalle}}-->
                                        <ul>
                                            <li v-for="d in i.detalle"> <i :class="'fa '+d.icono"></i> {{d.descripcion}} </li>
                                        </ul>
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" @click="modificarcetificado(i)" data-toggle="modal" data-target="#update" class="btn btn-warning btn-sm"> <i class="fa fa-edit"></i> </button>
                                            <button type="button" @click="eliminarcetificado(i)" class="btn btn-danger btn-sm" > <i class="fa fa-trash"></i> </button>
                                            <button type="button" @click="participantes(i)" data-toggle="modal" data-target="#participantes" class="btn btn-info btn-sm"> <i class="fa fa-users"></i> </button>
                                            <a href="certificado/1">ceriticados</a>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- crear -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header text-white bg-success">
                        <h5 class="modal-title " id="exampleModalLabel"><i class="fa fa-plus-circle"></i> Crear curso</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form @submit.prevent="guardarcurso()">
                            <div class="form-group row">
                                <label for="nombre" class="col-sm-2 col-form-label">Nombre</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="nombre" placeholder="Nombre" v-model="certificado.nombre">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="descripcion" class="col-sm-2 col-form-label">Descripcion</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="descripcion" placeholder="Descripcion" v-model="certificado.descripcion">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="fecha" class="col-sm-2 col-form-label">Fecha</label>
                                <div class="col-sm-10">
                                    <input type="date" class="form-control" id="fecha" placeholder="Fecha" v-model="certificado.fecha">
                                </div>
                            </div>
                            <table class="table-bordered table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Icono</th>
                                        <th>Detalle</th>
                                        <th>Opciones</th>
                                    </tr>
                                    <tr v-for="(i,index) in certificado.detalle" :key="index">
                                        <td>{{index+1}}</td>
                                        <td><input type="text" v-model="i.icono" class="form-control"></td>
                                        <td><input type="text" v-model="i.descripcion" class="form-control"></td>
                                        <td>
                                            <div class="btn-group">
                                                <button type="button" @click="mas"  class="btn btn-success btn-sm "><i class="fa fa-plus-circle"></i></button>
                                                <button v-if="index!=0" type="button" @click="menos(index)" class="btn btn-danger btn-sm"><i class="fa fa-minus-circle"></i></button>
                                            </div>

                                        </td>
                                    </tr>
                                </thead>

                            </table>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-trash"></i>Cerrar</button>
                                <button type="submit" class="btn btn-success"><i class="fa fa-save"></i>Guardar</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
        <!-- Modificar -->
        <div class="modal fade" id="update" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header  bg-warning">
                        <h5 class="modal-title " id="exampleModalLabel1"><i class="fa fa-plus-circle"></i> Modificar curso</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form @submit.prevent="modificarcurso()">
                            <div class="form-group row">
                                <label for="nombre2" class="col-sm-2 col-form-label">Nombre</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="nombre2" placeholder="Nombre" v-model="certificado.nombre">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="descripcion2" class="col-sm-2 col-form-label">Descripcion</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="descripcion2" placeholder="Descripcion" v-model="certificado.descripcion">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="fecha2" class="col-sm-2 col-form-label">Fecha</label>
                                <div class="col-sm-10">
                                    <input type="date" class="form-control" id="fecha2" placeholder="Fecha" v-model="certificado.fecha">
                                </div>
                            </div>
                            <table class="table-bordered table">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Icono</th>
                                    <th>Detalle</th>
                                    <th>Opciones</th>
                                </tr>
                                <tr v-for="(i,index) in certificado.detalle" :key="index">
                                    <td>{{index+1}}</td>
                                    <td><input type="text" v-model="i.icono" class="form-control"></td>
                                    <td><input type="text" v-model="i.descripcion" class="form-control"></td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" @click="mas"  class="btn btn-success btn-sm "><i class="fa fa-plus-circle"></i></button>
                                            <button v-if="index!=0" type="button" @click="menos(index)" class="btn btn-danger btn-sm"><i class="fa fa-minus-circle"></i></button>
                                        </div>

                                    </td>
                                </tr>
                                </thead>

                            </table>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-trash"></i>Cerrar</button>
                                <button type="submit" class="btn btn-success"><i class="fa fa-save"></i>Guardar</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
        <!-- Modificar -->
        <div class="modal fade" id="participantes" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header  bg-warning">
                        <h5 class="modal-title " id="exampleModalLabel3"><i class="fa fa-plus-circle"></i> Modificar curso</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form @submit.prevent="insertparticipantes()">
                            <div class="form-group row">
                                <label for="file" class="col-sm-2 col-form-label">Excel</label>
                                <div class="col-sm-8">
                                    <input type="file" class="form-control" id="file" placeholder="Excel" required>
                                </div>
                                <div class="col-sm-2">
                                    <button type="submit" class="btn btn-success btn-block"><i class="fa fa-save"></i>Guardar</button>
                                </div>
                            </div>

                            <table class="table-bordered table">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre Completo</th>
                                    <th>Certificado</th>
<!--                                    <th>Opciones</th>-->
                                </tr>
                                <tr v-for="(i,index) in alu" :key="index">
                                    <td>{{i.id}}</td>
                                    <td>{{i.nombre}}</td>
                                    <td>
                                        <a type="button" :href="'../cer/'+i.id" target="_blank"  class="btn btn-dark btn-sm "><i class="fa fa-credit-card"></i> Certificado</a>
                                    </td>
    <!--                                    <td>-->
<!--                                        <div class="btn-group">-->
<!--                                            <button type="button" @click="mas"  class="btn btn-success btn-sm "><i class="fa fa-plus-circle"></i></button>-->
<!--                                            <button type="button" @click="menos(index)" class="btn btn-danger btn-sm"><i class="fa fa-minus-circle"></i></button>-->
<!--                                        </div>-->

<!--                                    </td>-->
                                </tr>
                                </thead>

                            </table>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-trash"></i>Cerrar</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data(){
        return{
          certificado:{detalle:[{icono:'',descripcion:''}]},
            alu:[],
            certificados:[],
        }
    },
    mounted() {
        // console.log('Component mounted.')
        this.misdatos();
        // this.$swal('Hello Vue world!!!');

    },
    methods:{
        mas(){
            this.certificado.detalle.push({icono:'',descripcion:''})
        },
        menos(index){
            // this.certificado.detalle.push({icono:'',descripcion:''})
            this.certificado.detalle.splice(index,1);
        },
        misdatos(){
            axios.get('/certificado').then(res=>{
                // console.log(res.data);
                this.certificados=res.data;
            });
        },
        guardarcurso(){
            axios.post('/certificado',this.certificado).then(res=>{
                this.misdatos();
                this.$swal(
                    'Creado',
                    'Correctamente',
                    'success'
                )
                $('#exampleModal').modal('hide');
                this.certificado={detalle:[{icono:'',descripcion:''}]};
            });
        },
        modificarcetificado(i){
            this.certificado=i;
        },
        nuevo(){
            this.certificado={detalle:[{icono:'',descripcion:''}]};
        },
        modificarcurso(){
            axios.put('/certificado/'+this.certificado.id,this.certificado).then(res=>{
                this.misdatos();
                this.$swal(
                    'Modificado',
                    'Correctamente',
                    'success'
                )
                $('#update').modal('hide');
                this.certificado={detalle:[{icono:'',descripcion:''}]};
            });
        },
        eliminarcetificado(i){
            this.$swal({
                title: 'Eliminar?',
                text: "Seguro de eliminar?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si'
            }).then((result) => {
                if (result.isConfirmed) {
                    axios.delete('/certificado/'+i.id).then(res=>{
                        this.misdatos();
                        this.$swal(
                            'Eliminado',
                            'Correctamente',
                            'success'
                        )
                    }).catch(e=>{
                        this.$swal(
                            'Error',
                            'Nose puede eliminar por que el curso tiene alumnos',
                            'error'
                        )
                    });
                }
            })
            // axios.delete('/certificado/'+i.id).then(res=>{
            //     this.misdatos();
            //     this.$swal(
            //         'Eliminado',
            //         'Correctamente',
            //         'success'
            //     )
            // });
        },
        participantes(i){
            this.certificado=i;
            axios.get('/participante/'+this.certificado.id).then(res=>{
                this.alu=res.data;
                // console.log(this.alu);
            });
        },
        insertparticipantes(){
            // console.log(this.certificado);
            let data = new FormData();
            data.append('archivo', document.getElementById('file').files[0]);
            data.append('id',this.certificado.id);
            let id =this.certificado.id;
            axios.post('/participante',data).then(res=> {
                axios.get('/participante/'+id).then(res=>{
                    this.alu=res.data;
                    // console.log(this.alu);
                    this.$swal(
                        'Alumnos agregados',
                        'Correctamente',
                        'success'
                    )
                });
            });
        }

    }
}
</script>
