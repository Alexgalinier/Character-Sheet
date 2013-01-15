<script type="text/template" id="tmpl-spell">
    <%
        var border_i = 1,
            spell_list_i = 1, 
            spell_i = 1,
            almostOne = false; 
    %>
    <div id="misc-per-lvl" class="float border-<%= border_i %>">
        <table>
            <thead>
                <tr>
                    <th><%= lvl %></th>
                    <th><%= mana %></th>
                    <th><%= diff_normal %></th>
                    <th><%= diff_spec %></th>
                    <th><%= cost %></th>
                </tr>
            </thead>
            <tbody>
            <% _.each(misc_per_lvl, function(item) { %>
                <tr>
                    <td><%= item['lvl'] %></td>
                    <td><%= item['mana'] %></td>
                    <td><%= item['diff'] %></td>
                    <td><%= item['diff_spec'] %></td>
                    <td><%= item['aug'] %></td>
                </tr>
            <% }) %>
            </tbody>
        </table>
    </div>
    <% 
        border_i++;
        _.each(spells_label, function(item) {
            almostOne = false;
            for (spell_i = 1; spell_i <= 6; spell_i++) { 
                if(spells['list-'+spell_list_i + '-' + 'spell-'+spell_i] != undefined) {
                    almostOne = true;
                    break;
                }
            }
            
            if(almostOne) {
    %>
    <div class="float spell-lists only-spell border-<%= border_i %> <% if(spells['list-'+spell_list_i] != undefined) { %>spec<% } %>" >
        <table>
            <thead>
                <tr>
                    <th><%= item['name'] %></th>
                </tr>
            </thead>
            <tbody>
                <% 
                    for (spell_i = 1; spell_i <= 6; spell_i++) { 
                        if(spells['list-'+spell_list_i + '-' + 'spell-'+spell_i] != undefined) {
                %>
                <tr class="enable">
                    <td><%= spells_label['list-'+spell_list_i]['spell-'+spell_i] %></td>
                </tr>
                <% 
                        } 
                    } 
                %>
            </tbody>
        </table>
    </div>
    <%
                border_i++;
                border_i = (border_i % 9 == 0) ? 1 : border_i % 9;
            }
        spell_list_i++;
        }) 
    %>
    <div id="show-hide-all-spells"><%= shod_hide_spells %></div>
    <div id="all-spells">
        <% 
            spell_list_i = 1;
            spell_i = 1;

            _.each(spells_label, function(item) {
        %>
        <div class="float spell-lists border-<%= border_i %>" >
            <table>
                <thead>
                    <tr>
                        <th>
                            <% if(show_unchecked_spec || spells['list-'+spell_list_i] != undefined) { %>
                            <input type="checkbox" id="<%= 'list-'+spell_list_i %>"  <% if(spells['list-'+spell_list_i] != undefined) { %> checked="checked" <% } %> />
                            <% } %>
                        </th>
                        <th><%= item['name'] %></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="2">
                            <p>" <%= item['description'] %> "</p>
                        </td>
                    </tr>
                    <% 
                        for (spell_i = 1; spell_i <= 6; spell_i++) { 
                    %>
                    <tr <% if (spell_i > spell_lvl_max) { %>class="disabled"<% } %><% if(spells['list-'+spell_list_i + '-' + 'spell-'+spell_i] != undefined) { %>class="enabled"<% } %>>
                        <td>
                            <% if (spell_i <= spell_lvl_max) { %>
                            <input type="checkbox" id="<%= 'list-'+spell_list_i + '-' + 'spell-'+spell_i %>"  <% if(spells['list-'+spell_list_i + '-' + 'spell-'+spell_i] != undefined) { %> checked="checked" <% } %> />
                            <% } %>
                        </td>
                        <td><%= spells_label['list-'+spell_list_i]['spell-'+spell_i] %></td>
                    </tr>
                    <% } %>
                </tbody>
            </table>
        </div>
        <%
            spell_list_i++;
            border_i++;
            border_i = (border_i % 9 == 0) ? 1 : border_i % 9;
            }) 
        %>
    </div>
    <div id="legends" class="float border-<%= border_i %>">
        <table>
            <tbody>
                <% _.each(spells_label, function(item) { %>
                    <% if (item['legend']) { %>
                <tr>
                    <td><%= item['name'] %></td>
                    <td><%= item['legend'] %></td>
                </tr>
                    <% } %>
                <% }) %>
            </tbody>
        </table>
    </div>
    <div class="space"></div>
</script>