<template>
  <div>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-2" v-if="showButtons == true" @click.prevent="consultaSolicitudes">
        <div class="bg-white rounded-lg shadow-xl lg:flex lg:max-w-lg hover:bg-red-300 transition duration-500 hover:scale-105" @click="showSolicitud=false, showConsulta=true, showButtons=false">
            <img src="https://i.pinimg.com/474x/4a/4e/1c/4a4e1ce384bf9dec3db29aa2326e6a35.jpg"
                class="w-1/1 lg:w-1/2 rounded-l-2xl">
            <div class="p-6">
                <h2 class="mb-2 text-2xl font-bold text-gray-900">Consultar solicitudes</h2>
                <p class="text-gray-600">Consulta las solicitudes de donación de sangre.</p>
            </div>
        </div>
        <div class="bg-white rounded-lg shadow-xl lg:flex lg:max-w-lg hover:bg-red-300 transition duration-500 hover:scale-105" @click="showSolicitud=true, showConsulta=false, showButtons=false">
            <img src="https://laopcion.com.mx/assets/2020/december/28/19c9986359df2490c32f48f47ad3fdc1.jpg"
                class="w-1/1 lg:w-1/2 rounded-l-2xl">
            <div class="p-6">
                <h2 class="mb-2 text-2xl font-bold text-gray-900">Realizar solicitudes</h2>
                <p class="text-gray-600">Realiza una solicitud de donación de sangre.</p>
            </div>
        </div>
    </div>


   <form @submit.prevent="onSubmit"  id="alta" v-if="showSolicitud == true">

    <div class="text-gray-700 text-base font-bold text-center text-xl mb-2">Registrar solicitud de donación de sangre</div>
    <br><br>
    <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-5 gap-6">
        <div class="w-full md:w-full px-3 mb-6 md:mb-0">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-state">
            Paciente
        </label>
        <div class="relative">
            <select v-model="id_paciente" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state" @click="consultaPacientes">
                <option v-for="paciente in pacientes" :key="paciente.id_paciente" :value="paciente.id_paciente">{{paciente.nombre}}</option>
            </select>
            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
            </div>
        </div>
        </div>

        <div class="w-full md:w-full px-3 mb-6 md:mb-0">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-city">
            Cant. Donadores
        </label>
        <input v-model="cantidad_donadores" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded focus:outline-none focus:bg-white focus:border-gray-500" id="grid-city" type="number" min="1" max="99" step="1"  placeholder="1">
        </div>

        <div class="w-full md:w-full px-3 mb-6 md:mb-0">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-state">
            Urgente
        </label>
        <div class="relative">
            <select v-model="urgente" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">
            <option value="NO">NO</option>
            <option value="SI">SI</option>
            </select>
            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
            </div>
        </div>
        </div>

        <div class="w-full md:w-full px-3 mb-6 md:mb-0">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-state">
            Tipo de sangre
        </label>
        <div class="relative">
            <select v-model="tipo_sangre" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">
            <option value="Todos">Todos</option>
            <option value="A positivo">A positivo</option><option value="A negativo">A negativo</option>
            <option value="O positivo">O positivo</option><option value="O negativo">O negativo</option>
            <option value="B positivo">B positivo</option><option value="B negativo">B negativo</option>
            <option value="AB positivo">AB positivo</option><option value="AB negativo">AB negativo</option>
            </select>
            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
            </div>
        </div>
        </div>

        <div class="w-full md:w-full px-3 mb-6 md:mb-0">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-city">
            Acciones
        </label>
        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Registrar solicitud
        </button>
        </div>
       </div>
    </form>
        <br><br>
        <div class="text-center w-full md:w-5/5 px-3" v-if="showSolicitud == true">
        <button @click="showButtons=true, showSolicitud=false, showAgregarPaciente=false" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
            Regresar
        </button>
        &nbsp;
        <button @click="showAgregarPaciente=!showAgregarPaciente" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">
            Agregar paciente
        </button>
        &nbsp;
        </div>
        <div class="text-center w-full md:w-5/5 px-6" v-if="showAgregarPaciente==true">
                <AgregarPaciente  @cancelar="cancelar"/>
        </div>


    <!-- component -->
    <div class="text-gray-700 text-base font-bold text-center text-xl mb-2" v-if="showConsulta==true">Solicitudes de donación de sangre</div>
    <br><br>
    <table class="min-w-full border-collapse block md:table" v-if="showConsulta==true">
		<thead class="block md:table-header-group">
			<tr class="border border-grey-500 md:border-none block md:table-row absolute -top-full md:top-auto -left-full md:left-auto  md:relative ">
				<th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Fecha</th>
				<th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Nombre del Paciente</th>
				<th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Cant. Donadores</th>
				<th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Urgente</th>
                <th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Tipo de sangre</th>
                <th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Estatus</th>
				<th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Acciones</th>
			</tr>
		</thead>
		<tbody class="block md:table-row-group">
			<tr class="bg-gray-300 border border-grey-500 md:border-none block md:table-row hover:bg-red-300" v-for="solicitud in solicitudes" :key="solicitud.id_solicitud">
				<td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span class="inline-block w-1/3 md:hidden font-bold">Fecha</span>{{solicitud.fecha}}</td>
				<td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span class="inline-block w-1/3 md:hidden font-bold">Nombre del paciente</span>{{solicitud.nombre}}</td>
				<td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span class="inline-block w-1/3 md:hidden font-bold">Cant. Donadores</span>{{solicitud.cantidad_donadores}}</td>
				<td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span class="inline-block w-1/3 md:hidden font-bold">Urgente</span>{{solicitud.urgente}}</td>
                <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span class="inline-block w-1/3 md:hidden font-bold">Tipo de sangre</span>{{solicitud.tipo_sangre}}</td>
                	<td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span class="inline-block w-1/3 md:hidden font-bold">Estatus</span>{{solicitud.estatus}}</td>
				<td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
					<span class="inline-block w-1/3 md:hidden font-bold">Acciones</span>
					<button @click="cancelarSolicitud(solicitud.id_solicitud)" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 border border-red-500 rounded">Cancelar</button>
					<button @click="editarSolicitud(solicitud)" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 border border-blue-500 rounded">Editar</button>
                    <button @click="actualizarSolicitud(solicitud.id_solicitud)" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-1 px-2 border border-yellow-500 rounded">Atendida</button>
				</td>
			</tr>
		</tbody>
	</table>
        <div class="text-center min-w-full py-3 px-5 mb-4 bg-yellow-100 text-yellow-900 text-sm rounded-md border border-yellow-200" role="alert" v-if="showConsulta==true && showSinSolicitudes==true">
                            No hay solicitudes de donación de sangre registradas para la institución
        </div>

        <div class="text-center w-full md:w-5/5 px-6" v-if="showEditarSolicitud==true">
                <EditarSolicitud  v-bind:solicitud="solicitud" :key="solicitud" @cancelar="cancelar"/>
        </div>

        <br><br>
        <div class="text-center w-full md:w-5/5 px-6" v-if="showConsulta==true">
            <button @click="showButtons=true, showConsulta=false, showEditarSolicitud=false" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                Regresar
            </button>
        </div>
        <br>


  </div>



</template>

<script>
    import AgregarPaciente from '@/Pages/solicitudes/agregarPaciente.vue'
    import EditarSolicitud from '@/Pages/solicitudes/editarSolicitud.vue'
    export default {
        components: {
            AgregarPaciente,
            EditarSolicitud,
        },


        data() {
            return{
                showButtons: true,
                showConsulta: false,
                showSolicitud: false,
                showAgregarPaciente: false,
                showSinSolicitudes: false,
                showEditarSolicitud: false,

                solicitudes: null,
                solicitud: null, //para actualizar datos

                id_paciente: '',
                cantidad_donadores: 1,
                urgente: 'NO',
                tipo_sangre: 'Todos',
                id_user: '',
                pacientes: '',


            submitted: {
                id_user: '',
                id_paciente: '',
                cantidad_donadores: '',
                tipo_sangre: '',
                }

            }
        },

        mounted() {

        },

        methods: {
            onSubmit: function(event) {
                if (this.id_paciente>0) {
                    this.submitted.id_paciente = this.id_paciente
                    this.submitted.cantidad_donadores = this.cantidad_donadores
                    this.submitted.urgente = this.urgente
                    this.submitted.tipo_sangre = this.tipo_sangre
                    this.guardar(this.submitted)
                    ///event.target.reset()
                } else {
                    alert("Seleccione o agregue un paciente a la solicitud de donación")
                }

            },
            consultaPacientes(){
                let ruta = 'consultapacientes'
                axios.get(ruta).then((response) => {
                    this.pacientes = response.data;
                });

            },
            consultaSolicitudes(){
                this.showSinSolicitudes = false;
                let ruta = 'consultasolicitudes'
                axios.get(ruta).then((response) => {
                    this.solicitudes = response.data;
                    if(response.data == 0){
                        this.showSinSolicitudes = true;
                    }
                });

            },
            cancelar(){
                this.showAgregarPaciente = false;
                this.showEditarSolicitud = false;
                this.consultaSolicitudes();
            },
            guardar(solicitud){
                    let ruta = "registrarsolicitud"
                    axios.post(ruta, {
                        id_paciente: solicitud.id_paciente,
                        cantidad_donadores: solicitud.cantidad_donadores,
                        urgente: solicitud.urgente,
                        tipo_sangre: solicitud.tipo_sangre,
                    }).then((response) => {
                        var respuesta = response.data
                        if(respuesta > 0){
                            alert("Solicitud agregada correctamente")
                            this.submitted.id_paciente = this.id_paciente = ''
                            this.submitted.cantidad_donadores = this.cantidad_donadores = 1
                            this.submitted.urgente = this.urgente = 'NO'
                            this.submitted.tipo_sangre = this.tipo_sangre = 'Todos'
                        }
                        else{
                         alert("Ocurrió un error al guardar la información")
                        }
                    })
                    .catch(function (error) {
                        console.log(error);
                    });

            },
            cancelarSolicitud(id){
                let ruta = 'cancelarsolicitud/'.concat(id)
                axios.get(ruta).then((response) => {
                    //this.solicitudes = response.data;
                    if(response.data>0){
                        alert("La solicitud ha sido cancelada")
                        this.consultaSolicitudes();
                    }else{
                        alert("Ocurrió un error al cancelar la solicitud")

                    }
                });
            },
            actualizarSolicitud(id){
                let ruta = 'actualizarsolicitud/'.concat(id)
                axios.get(ruta).then((response) => {
                    //this.solicitudes = response.data;
                    if(response.data>0){
                        alert("La solicitud ha sido actualizada como: ATENDIDA")
                        this.consultaSolicitudes();
                    }else{
                        alert("Ocurrió un error al actualizar la solicitud")

                    }
                });
            },
            editarSolicitud(solicitud){
                this.solicitud = solicitud
                this.showEditarSolicitud = true
            },


        }
    }
</script>
