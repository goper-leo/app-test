<template>
  <div class="row">
    <div class="col-xs-12">
      <div class="table-responsive">
        <table class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>Name</th>
              <th>Campus Eligibility</th>
              <th>School</th>
              <th>Division</th>
            </tr>

          </thead>
          <tbody>
            <Entry v-for="passer in data"
              :passer="passer"
              :key="passer.id"></Entry>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</template>

<script>
  import Entry from './Entry';

  export default {

    /**
     * Data
     *
     * @return {Object}
     * @author {goper}
     */
    data()
    {
      return {
        data: [],
      }
    },

    components: {
      Entry,
    },

    computed: {

    },

    methods: {

      fetch()
      {
        http.getJSON('api/passers')
          .then(({data}) => {
            let {passers} = data;

            this.data = passers;
          })
          .catch(error => console.log('error', error));
      },
    },

    created()
    {
      // Fetch all passers
      this.fetch();
    }
  }
</script>
