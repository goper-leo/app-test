<template>
  <div class="passers-list">
    <div class="row">
      <div class="col-12">
        <div class="table-responsive">
          <h3>Group number of passers per DIVISION</h3>
          <table class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>School</th>
                <th>Passers Count</th>
              </tr>

            </thead>
            <tbody>
              <Entry v-for="passer in data"
              :data="passer"
              :key="passer.id"></Entry>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Vue from 'vue';
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

      http.getJSON('api/passers/sort')
      .then(({data}) => {
        this.data = data.data;

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
