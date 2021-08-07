<?php

/**
 * @Profile
 *
 * @OA\Get(
 *     path="/1.0/users/profile",
 *     description="User Profile",
 *     tags={"Users"},
 *     security={
 *          {"passport": {}},
 *      },
 *     @OA\Response(
 *          response=200,
 *          description="successfully logged",
 *          @OA\JsonContent(ref="#/components/schemas/UserProfileResponse200Virtual")
 *      ),
 *     @OA\Response(
 *          response=401,
 *          description="token required",
 *          @OA\JsonContent(ref="#/components/schemas/Response401Virtual")
 *      )
 * )
 */
