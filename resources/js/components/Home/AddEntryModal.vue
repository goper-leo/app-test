<template>
  <div>
    <button type="button" class="btn btn-primary" @click="showModal">Add New Passer</button>

    <b-modal ref="addEntryModal" hide-footer title="Add New Passer">
      <div class="d-block text-left container">
        <div class="alert alert-primary" role="alert" v-text="response.message" v-if="response.success"></div>
        <div class="form-group row">
          <label class="col-form-label">Name</label>
          <div class="col-sm-12">
            <input type="text" class="form-control" value="" v-model="form.name">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-form-label">Campus Eligibility</label>
          <div class="col-sm-12">
            <input type="text" class="form-control" v-model="form.campus_eligibility">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-form-label">School</label>
          <div class="col-sm-12">
            <input type="text" class="form-control" value="" v-model="form.school">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-form-label">Division</label>
          <div class="col-sm-12">
            <input type="text" class="form-control" value="" v-model="form.division">
          </div>
        </div>
      </div>
      <button class="mt-3 btn btn-primary" @click="save">Add</button>
      <button class="mt-3 btn btn-danger" @click="hideModal">Close Me</button>
    </b-modal>
  </div>

</template>

<script>
import bModal from 'bootstrap-vue/es/components/modal/modal';

  export default {

    components: {
      bModal
    },

    data()
    {
      return {
        form: {
          name: '',
          campus_eligibility: '',
          school: '',
          division: '',
        },
        response: {
          'success': false,
          'message': '',
        }
      }
    },

    methods: {

      /**
       * Show modal
       * @return {[type]} [description]
       */
      showModal()
      {
        this.$refs.addEntryModal.show();
      },

      /**
       * Hide modal
       * @return {[type]} [description]
       */
      hideModal()
      {
        this.$refs.addEntryModal.hide();
      },

      /**
       * Reset form values
       * @return {void}
       */
      reset()
      {
        this.form.name = '';
        this.form.campus_eligibility = '';
        this.form.school = '';
        this.form.division = '';
      },

      save()
      {
        let form = this.form;
        http.postJSON('api/passers/store', form)
          .then(({data}) => {
            let {success, message} = data;

            this.response.success = success;
            this.response.message = message;

            this.reset();
          })
          .catch(error => reject(error));
      },
    },

  }
</script>
