<script type="text/template" id="tmpl-skill">
    <?php 
        $list = Rest::$rests['Skill']->getSkills(); 
        $skill_i = 1;
    ?>
    <?php foreach($list as $path => $data): ?>
    <div class="float consult border-<?php echo $skill_i; ?>" id="skill-<?php echo $skill_i; ?>">
        <h2>
            <%= <?php echo $path; ?> %>
            <span>(<%= <?php echo $data['charac']; ?> %>)</span>
            <span class="knowledge"><%= knowledge %> : <%= <?php echo $path; ?>_knowledge %></span>
        </h2>
        <table>
            <thead>
                <tr>
                    <th><%= spec %></th>
                    <th><%= jet %></th>
                    <th><%= name %></th>
                    <th><%= charac %></th>
                    <th><%= base %></th>
                    <th><%= bonus %></th>
                    <th><%= aug %></th>
                    <th><%= miss %></th>
                    <th>%</th>
                    <th><%= total %></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($data['skills'] as $skill): ?>
                    <?php 
                        $skillInfos = explode(':', $skill);
                        $skillName = $skillInfos[0];
                        $skillCharac = $skillInfos[1].'_short';
                    ?>
                <tr<% if(<?php echo $skillName; ?>_spec == 1) { %> class="spec-tr" <% } %>>
                    <td>
                        <% if(show_unchecked_spec || <?php echo $skillName; ?>_spec == 1) { %>
                        <input type="checkbox" id="<?php echo $skillName; ?>_spec"  <% if(<?php echo $skillName; ?>_spec == 1) { %> checked="checked" <% } %> />
                        <% } %>
                    </td>
                    <td>
                       <input type="number" id="<?php echo $skillName; ?>_jet" value="<%= <?php echo $skillName; ?>_jet %>" />
                    </td>
                    <td><%= <?php echo $skillName; ?> %></td>
                    <td><%= <?php echo $skillCharac; ?> %></td>
                    <td><%= <?php echo $skillName; ?>_base %></td>
                    <td><input type="number" id="<?php echo $skillName; ?>_bonus" value="<%= <?php echo $skillName; ?>_bonus %>" /></td>
                    <td><input type="number" id="<?php echo $skillName; ?>_aug" value="<%= <?php echo $skillName; ?>_aug %>" /></td>
                    <td><input type="number" id="<?php echo $skillName; ?>_miss" value="<%= <?php echo $skillName; ?>_miss %>" /></td>
                    <td><%= <?php echo $skillName; ?>_success_perc %></td>
                    <td><%= <?php echo $skillName; ?>_total %> <small>/ <%= <?php echo $skillName; ?>_max %></small></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <?php $skill_i++; ?>
    <?php endforeach; ?>
    <div id="set-unset-edit"><%= set_unset_edit %></div>
</script>