<?php


class ProjectManagement
{
    public function jobDescription(ProjectMember $member)
    {
        return $member->workDescription();
    }

}
